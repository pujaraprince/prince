<?php

echo "Question : Write a script to perform various string operations like concatenation, substring extraction, and string length determination.". "<br><br>";

// Define some sample strings
$string1 = "Hello";
$string2 = "World!";
$string3 = "This is a PHP string operations example.";

// 1. String Concatenation
$concatenatedString = $string1 . " " . $string2; // Using the dot operator
echo "Concatenated String: " . $concatenatedString . "<br><br>";
// 2. Substring Extraction

$substring = substr($string3, 10, 2); // Extracts 2 characters starting from index 10
echo "Extracted Substring: " . $substring . "<br><br>";

// 3. String Length Determination
$stringLength = strlen($string3); // Gets the length of the string
echo "Length of String: " . $stringLength . "<br><br>";

?>