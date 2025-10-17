<?php
echo "Questions: Write a script to establish a database connection and handle any errors during the
connection process.". "<br><br>";

 ?>

 <?php
// Database configuration
$servername = "localhost";   // Database server (usually localhost)
$username   = "root";        // Database username
$password   = "";            // Database password
$dbname     = "advance_ass"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connected successfully!";
}

// Optional: Close the connection after use
// $conn->close();
?>
