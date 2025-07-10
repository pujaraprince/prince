<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <p>Question: Ternary Operator Example :Write a script using the ternary operator to display a message if the age is greater than 18. </p>
    <h1>Age Check</h1>
    <form method="post">
        <label for="age">Enter your age:</label>
        <input type="number" name="age" id="age" required>
        <button type="submit" name="submit">Check Age</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $age = $_POST['age'];
        
       
        $ans = ($age > 18) ? "You are an Men." : "You are Child";
        
        echo "<h3>$ans</h3>";
    }
    ?>
</body>
</html>