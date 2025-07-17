<?php

session_start();

// Initialize password in session if not set
if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = '12345'; // default password
}

// If already logged in, redirect to main menu
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: mainmenu.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_password = $_POST['password'] ?? '';

    if ($entered_password === $_SESSION['password']) {
        $_SESSION['authenticated'] = true;
        header("Location: mainmenu.php");
        exit();
    } else {
        $error = "Incorrect password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
       <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4 ">

    <h2 class="mb-4 text-primary" >Enter the Password </h2>
<p>Password:12345</p>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><strong><?php echo htmlspecialchars($error); ?></strong></p>
    <?php endif; ?>

    <form method="POST" class="border p-4  shadow-sm">
        <div class="mb-3">
        <input type="password" name="password" required>
    </div>
        <button class="btn btn-primary" type="submit">Login</button>
    </form>

    </div>
</body>
</html>
