<?php

echo "Question: Factorial: Write a function that finds the factorial of a number using recursion.". "<br><br>";


function factorial($n) {
    // Base case: if n is 0 or 1, return 1
    if ($n === 0 || $n === 1) {
        return 1;
    }
    // Recursive case: n * factorial of (n - 1)
    return $n * factorial($n - 1);
}


$number = 5;
echo "The factorial of $number is " . factorial($number);
echo "<br><br><br><br>"
?>

<?php

echo "Question: String Reverse: Reverse a string without using built-in functions.". "<br><br>";

function reverseString($str) {
    $reversed = '';
    $length = 0;

   
    while (isset($str[$length])) {
        $length++;
    }

   
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }

    return $reversed;
}


$inputString = "Hello, World!";
echo "Original String: $inputString\n";
echo "Reversed String: " . reverseString($inputString);

echo "<br><br><br><br>"
?>

<?php

echo "Question: Download File: Create a button that allows users to download a file.". "<br><br>";

if (isset($_POST['download'])) {
    $filename = 'string.php'; 
    $filepath = __DIR__ . '/' . $filename;
    
 
    if (file_exists($filepath)) {
        // Set headers for file download
      
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        $error = "File not found!";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   
</head>
<body>

        <h2>File Download Example</h2>
        <p>Click the button below to download the example file:</p>
        
        <form method="post">
            <button type="submit" name="download" class="download-btn">
                Download File
            </button>
        </form>
        
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <p><small>The file will be named "string.php"</small></p>
 
</body>
</html>
