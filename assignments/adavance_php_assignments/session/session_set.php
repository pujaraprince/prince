<?php

echo "Questions: Write a script to create a session and store user data, and then
 retrieve it on a different page. Also, demonstrate how to set and retrieve a cookie.". "<br><br>";

?>

<?php
// Start session
session_start();

// Store data in session variables
$_SESSION['username'] = "Prince";
$_SESSION['email'] = "prince@example.com";

// Set a cookie (expires in 1 hour)
setcookie("user_theme", "light_mode", time() + 3600, "/"); // "/" means available site-wide

echo "<h3> Session and Cookie Data Set Successfully!</h3>";
echo "<a href='session_get.php'>Go to Next Page ➡</a>";
?>
