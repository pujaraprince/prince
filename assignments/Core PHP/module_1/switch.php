<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <p>Question: Restaurant Food Category Program: Use a switch case to display the category (Starter/MainCourse/Dessert) and dish based on users election.</p>
    <h1>Restaurant Food Menu</h1>
    <form method="post">
        <select name="category" required>
            <option value="">Select a food category</option>
            <option value="Starter">Starter</option>
            <option value="MainCourse">Main Course</option>
            <option value="Dessert">Dessert</option>
        </select>
        <button type="submit" name="submit">Show Dish</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $dish = '';
        
        switch ($category) {
            case 'Starter':
                $dish = 'Garlic Bread with Cheese';
                break;
            case 'MainCourse':
                $dish = 'Grilled Salmon with Vegetables';
                break;
            case 'Dessert':
                $dish = 'Chocolate Lava Cake';
                break;
            default:
                $dish = 'No dish selected';
        }
        
        echo '<div class="result" style="display: block;">';
        echo "<h3>Category: $category</h3>";
        echo "<p>Recommended Dish: <strong>$dish</strong></p>";
        echo '</div>';
    }
    ?>
</body>
</html>


