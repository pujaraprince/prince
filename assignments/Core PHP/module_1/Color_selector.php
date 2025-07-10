<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    
        <h1>Color Selection</h1>
        <form method="post">
            <label for="color">Select a color:</label><br><br>
            <select name="color" id="color" required><br>
                <option value="">-- Choose a color --</option>
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
            </select>
            <button style="margin-left:10px;" type="submit" name="submit">Select</button>
        </form>
        <br>
        <?php
        if (isset($_POST['submit'])) {
            $color = strtolower($_POST['color']);
         

        switch ($color) {
        case "red":
           echo "You have selected color is red!";
        break;
        case "blue":
           echo "You have selected color is blue!";
        break;
       case "green":
         echo "You have selected color is green!";
        break;
         default:
        echo "You have not selected color!";
}
        }
        ?>
    </div>
</body>
</html>
