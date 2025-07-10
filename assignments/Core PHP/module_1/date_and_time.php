<?php

echo "Question : Write a script to display the current date and time in different ". "<br><br>";

// Set the default timezone to India
date_default_timezone_set('Asia/Kolkata');

// Get the current date and time
$currentDateTime = new DateTime();

// Display current date and time in different formats
echo "Current Date and Time: " . $currentDateTime->format('Y-m-d H:i:s') . "<br><br>"; // YYYY-MM-DD HH:MM:SS
echo "Current Date: " . $currentDateTime->format('l, F j, Y') . "<br><br>"; // Day, Month Date, Year
echo "Current Time: " . $currentDateTime->format('h:i A') . "<br><br>"; // 12-hour format with AM/PM
echo "ISO 8601 Format: " . $currentDateTime->format(DateTime::ISO8601) . "<br><br>"; // ISO 8601 format
echo "RFC 2822 Format: " . $currentDateTime->format(DateTime::RFC2822) . "<br><br>"; // RFC 2822 format

?>
