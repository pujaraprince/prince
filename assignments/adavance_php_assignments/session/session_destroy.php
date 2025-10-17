<?php
session_start();

// Destroy session data
session_unset();
session_destroy();

// Expire the cookie
setcookie("user_theme", "", time() - 3600, "/");

echo "<h3> Session and Cookie Cleared!</h3>";
echo "<a href='session_set.php'>Start Again </a>";
?>
