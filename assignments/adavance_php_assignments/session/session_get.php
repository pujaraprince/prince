<?php
// Start session
session_start();

echo "<h2> Retrieved Session and Cookie Data</h2>";

// Retrieve session data
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    echo " Username: " . $_SESSION['username'] . "<br>";
    echo " Email: " . $_SESSION['email'] . "<br>";
} else {
    echo " No session data found.<br>";
}

// Retrieve cookie data
if (isset($_COOKIE['user_theme'])) {
    echo " User Theme (from cookie): " . $_COOKIE['user_theme'] . "<br>";
} else {
    echo " Cookie not found or expired.";
}

// Option to destroy session
echo "<br><br><a href='session_destroy.php'>Logout / Destroy Session</a>";
?>
