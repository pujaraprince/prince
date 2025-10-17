<?php
require_once "Database.php"; // include the class file

// Create database object
$db = new Database();

// Fetch all users from the "users" table
$query = "SELECT id, name, email FROM users";
$users = $db->select($query);

// Display user data
if (!empty($users)) {
    echo "<h2>User List</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    foreach ($users as $user) {
        echo "<tr>
                <td>{$user['id']}</td>
                <td>{$user['name']}</td>
                <td>{$user['email']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

// Close the database connection
$db->close();
?>
