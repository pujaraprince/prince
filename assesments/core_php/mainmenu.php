<?php
session_start();

$page_title = "Main Menu"; // default


// Protect page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}



// Initialize session array for books
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Define category labels
$categories = [
    '1' => 'Computer',
    '2' => 'Electrical',
    '3' => 'Electronics',
    '4' => 'Civil',
    '5' => 'Mechanics',
    '6' => 'Architecture'
];

// State variables
$step = $_POST['step'] ?? 'main';
$main_choice = $_POST['choice'] ?? '';
$category_choice = $_POST['add_choice'] ?? '';
$category = $_POST['category'] ?? '';
$message = "";


// Step 1: Handle main menu
if ($step === 'main') {
    switch ($main_choice) {
        case '1':
            $step = 'add_book_select_category';
           
            $page_title = 'Select Category';
            break;
        case '2': $step = 'delete_book_form';
        $page_title = 'Delete Book';
        break;
      
        case '3':
             $step = 'search_book_menu';
              $page_title = 'Search Book';
              break;

        case '4':
        $step = 'view_books';
         $page_title = 'View Book';
        break;

        case '5':
        $step = 'edit_book_prompt';
         $page_title = 'Edit Book';
        break;
        case '6':
        $step = 'change_password_form';
         $page_title = 'Change password';
        break;
        case '7':
            session_destroy();
            header("Location: login.php");
            exit();
        default:
            if ($main_choice !== '') $message = "Invalid choice!";
    }
}

// Step 2: Handle category selection
if ($step === 'add_book_select_category') {
    if (isset($category_choice) && array_key_exists($category_choice, $categories)) {
        $category = $categories[$category_choice];
        $step = 'add_book_form';
    } elseif ($category_choice === '7') {
        $step = 'main';
    } elseif ($category_choice !== '') {
        $message = "Invalid category!";
    }
}

// Step 3: Handle book info form
if ($step === 'add_book_form' && isset($_POST['book_id'])) {
    $book = [
        'category' => $_POST['category'],
        'id' => $_POST['book_id'],
        'name' => $_POST['book_name'],
        'author' => $_POST['author'],
        'quantity' => $_POST['quantity'],
        'price' => $_POST['price']
    ];

    $_SESSION['books'][] = $book;
    $message = "Book added successfully under category: " . htmlspecialchars($book['category']);
    $step = 'main';
}

// Step: Delete Book Form
if ($step === 'delete_book_form' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $deleted = false;

    foreach ($_SESSION['books'] as $index => $book) {
        if ($book['id'] === $delete_id) {
            unset($_SESSION['books'][$index]);
            $_SESSION['books'] = array_values($_SESSION['books']); // reindex
            $message = "Book with ID $delete_id deleted successfully.";
            $deleted = true;
            break;
        }
    }

    if (!$deleted) {
        $message = "Book with ID $delete_id not found.";
    }

    $step = 'main'; // Return to main menu
}

if ($step === 'search_book_menu' && isset($_POST['search_option'])) {
    $search_option = $_POST['search_option'];

    if ($search_option === '1') {
        $step = 'search_by_id';
    } elseif ($search_option === '2') {
        $step = 'search_by_name';
    } else {
        $message = "Invalid search option!";
        $step = 'main';
    }
}

if ($step === 'search_by_id' && isset($_POST['book_id'])) {
    $book_id = trim($_POST['book_id']);
    $result = array_filter($_SESSION['books'], function($book) use ($book_id) {
        return $book['id'] === $book_id;
    });

    if ($result) {
        $message = "The book is available in result.";
        $search_result = array_values($result);
    } else {
        $message = "No book found with ID: $book_id";
    }
    $step = 'search_result';
}

if ($step === 'search_by_name' && isset($_POST['book_name'])) {
    $book_name = strtolower(trim($_POST['book_name']));
    $result = array_filter($_SESSION['books'], function($book) use ($book_name) {
        return strtolower($book['name']) === $book_name;
    });

    if ($result) {
        $message = "The book is available in result.";
        $search_result = array_values($result);
    } else {
        $message = "No book found with name: $book_name";
    }
    $step = 'search_result';
}

if ($step === 'edit_book_prompt' && isset($_POST['edit_id'])) {
    $edit_id = trim($_POST['edit_id']);
    foreach ($_SESSION['books'] as $i => $book) {
        if ($book['id'] === $edit_id) {
            $_SESSION['edit_index'] = $i;
            $step = 'edit_book_form';
            $edit_book = $book;
            break;
        }
    }

    if (!isset($edit_book)) {
        $message = "Book with ID $edit_id not found.";
        $step = 'main';
    }
}

if ($step === 'edit_book_submit' && isset($_SESSION['edit_index'])) {
    $index = $_SESSION['edit_index'];

    $_SESSION['books'][$index] = [
        'id'       => $_POST['id'],        // Keep same ID
        'name'     => $_POST['name'],
        'author'   => $_POST['author'],
        'category' => $_POST['category'],
        'quantity' => $_POST['quantity'],
        'price'    => $_POST['price']
    ];

    unset($_SESSION['edit_index']);
    $message = "Book record updated successfully.";
    $step = 'main';
}

if ($step === 'change_password_form' && isset($_POST['old_password'], $_POST['new_password'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];

    if ($old === $_SESSION['password']) {
        $_SESSION['password'] = $new;
        $message = "Password changed successfully.";
    } else {
        $message = "Old password is incorrect.";
    }

    $step = 'main';
}

?>

<!DOCTYPE html>
<html>
<head><title>Main Menu</title></head>
<head>
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
<div class="container py-4">
<h2 class="mb-4 text-primary"><?php echo htmlspecialchars($page_title); ?></h2>


<?php if (!empty($message)) echo "<p style='color:green;'><strong>$message</strong></p>"; ?>

<!-- MAIN MENU -->
<?php if ($step === 'main'): ?>
    <ol>
        <li>Add book</li>
        <li>Delete book</li>
        <li>Search book</li>
        <li>View book list</li>
        <li>Edit book record</li>
        <li>Change password</li>
        <li>Close application</li>
    </ol>
    <form method="POST" class="border p-4  rounded shadow-sm">
        <div class="mb-3">
        <input type="hidden" name="step" value="main">
        <label>Enter your choice (1-7):</label>
        <input type="text" name="choice" required />
</div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>



<!-- CATEGORY SELECTION -->
<?php elseif ($step === 'add_book_select_category'): ?>
    <ol>
        <li>Computer</li>
        <li>Electrical</li>
        <li>Electronics</li>
        <li>Civil</li>
        <li>Mechanics</li>
        <li>Architecture</li>
        <li>Back to main menu</li>
    </ol>
    <form method="POST" class="border p-4  rounded shadow-sm">
        <div class="mb-3">
        <input type="hidden" name="step" value="add_book_select_category">
        <label>Enter your category choice (1-7):</label>
        <input type="text" name="add_choice" required />
</div>
        <button class="btn btn-success" type="submit">Next</button>
    </form>



<!-- BOOK INFO FORM -->
<?php elseif ($step === 'add_book_form'):   ?>
    
    <form method="POST" class="border p-4  rounded shadow-sm">
        <div class="mb-3">
        <input type="hidden" name="step" value="add_book_form">
        <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
        <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
        <label>Book Id:</label><br>
        <input type="text" name="book_id" required><br><br>

        <label>Book Name:</label><br>
        <input type="text" name="book_name" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" min="1" required><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" min="0" step="0.01" required><br><br>
</div>

        <button class="btn btn-dark" type="submit">Add Book</button>
    </form>


    
<?php elseif ($step === 'delete_book_form'): ?>

    
    <form method="POST" class="border p-4  rounded shadow-sm">
        <div class="mb-3">
        <input type="hidden" name="step" value="delete_book_form">
        <label>Enter the Book ID to delete:</label><br>
        <input type="text" name="delete_id" required><br><br>
</div>
        <button class="btn btn-danger" type="submit">Delete Book</button>
    </form>

    <?php elseif ($step === 'search_book_menu'): ?>
    <form method="POST" class="border p-4  rounded shadow-sm">
        <div class="mb-3">
        <input type="hidden" name="step" value="search_book_menu">
        <p>1. Search by ID</p>
        <p>2. Search by Name</p>
        <label>Enter your choice:</label>
        <input type="text" name="search_option" required>
    </div>
        <button class="btn btn-success" type="submit">Search</button>
    </form>


<?php elseif ($step === 'search_by_id'): ?>
    <form method="POST" class="border p-4  rounded shadow-sm">
         <div class="mb-3">
        <input type="hidden" name="step" value="search_by_id">
        <label>Enter Book ID:</label>
        <input type="text" name="book_id" required>
</div>
        <button class="btn btn-success" type="submit">Search</button>
    </form>


<?php elseif ($step === 'search_by_name'): ?>
    <form method="POST" class="border p-4  rounded shadow-sm">
         <div class="mb-3">
        <input type="hidden" name="step" value="search_by_name">
        <label>Enter Book Name:</label>
        <input type="text" name="book_name" required>
</div>
        <button class="btn btn-success" type="submit">Search</button>
    </form>


<?php elseif ($step === 'search_result'): ?>
 
    <?php if (!empty($search_result)): ?>
        <table border ="1">
            <tr><th>ID</th><th>Name</th><th>Author</th><th>Category</th><th>Qty</th><th>Price</th></tr>
            <?php foreach ($search_result as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['name']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['category']; ?></td>
                    <td><?php echo $book['quantity']; ?></td>
                    <td><?php echo $book['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
<?php endif; ?>
    <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back to Main Menu</a></p>

<?php endif; ?>

<?php if ($step === 'view_books'): ?>
    <h2>All Book Records</h2>

    <?php if (empty($_SESSION['books'])): ?>
        <p><strong>No books found.</strong></p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php foreach ($_SESSION['books'] as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['id']); ?></td>
                    <td><?php echo htmlspecialchars($book['name']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['category']); ?></td>
                    <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($book['price']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back to Main Menu</a></p>
<?php endif; ?>

<?php if ($step === 'edit_book_prompt'): ?>
    <form method="POST" class="border p-4 bg-white rounded shadow-sm" >
         <div class="mb-3">
        <input type="hidden" name="step" value="edit_book_prompt">
        <label>Enter Book ID to edit:</label><br>
        <input type="text" name="edit_id" required><br><br>
</div>
        <button class="btn btn-info" type="submit">Find Book</button>
    </form>
<?php endif; ?>

<?php if ($step === 'edit_book_form' && isset($edit_book)): ?>
    <form method="POST" class="border p-4 bg-white rounded shadow-sm">
    <div class="mb-3">
        <input type="hidden" name="step" value="edit_book_submit">
        <label>Book ID:</label>
        <input type="text" name="id" value="<?php echo htmlspecialchars($edit_book['id']); ?>" readonly><br>
        <label>Book Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit_book['name']); ?>" required><br>
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo htmlspecialchars($edit_book['author']); ?>" required><br>
        <label>Category:</label>
        <input type="text" name="category" value="<?php echo htmlspecialchars($edit_book['category']); ?>" required><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($edit_book['quantity']); ?>" required><br>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($edit_book['price']); ?>" required><br>
        <br>
        <button type="submit">Update Book</button>
    </form>
<?php endif; ?>

<?php if ($step === 'change_password_form'): ?>
    <form method="POST">
        <input type="hidden" name="step" value="change_password_form">
        <label>Enter Old Password:</label><br>
        <input type="password" name="old_password" required><br><br>

        <label>Enter New Password:</label><br>
        <input type="password" name="new_password" required><br><br>

        <button class="btn btn-info" type="submit">Change Password</button>
    </form>
<?php endif; ?>
</div>
</body>
</html>