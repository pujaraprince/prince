<?php

echo "Questions: Create a script that reads from a text file and
 displays its content on a web page". "<br><br>";

?>

<?php
// Specify the file name
$filename = "example.txt";

// Check if file exists
if (file_exists($filename)) {
    // Read the file content
    $content = file_get_contents($filename);

    // Display file content on the webpage
    echo "<h3>Contents of '$filename':</h3>";
    echo "<pre>$content</pre>";
} else {
    echo "<p style='color:red;'>File not found: $filename</p>";
}
?>
