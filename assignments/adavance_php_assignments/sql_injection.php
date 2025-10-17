<?php

echo "Questions: Create a vulnerable PHP script that demonstrates SQL injection.
 Then, rewriteit using prepared statements to prevent SQL injection attacks.". "<br><br>";

?>


<?php
/*
// vulnerable.php
// Intentionally vulnerable example — DO NOT deploy or run this on systems you don't control.

$host = '127.0.0.1';
$db   = 'test_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// create mysqli connection (simple example)
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Suppose we accept a 'username' GET parameter to look up user info
$username = isset($_GET['username']) ? $_GET['username'] : '';

$sql = "SELECT id, name, email FROM users WHERE username = '$username'"; // unsafe concatenation
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'ID: ' . htmlspecialchars($row['id']) . '<br>';
        echo 'Name: ' . htmlspecialchars($row['name']) . '<br>';
        echo 'Email: ' . htmlspecialchars($row['email']) . '<br>';
    }
} else {
    echo "No user found.";
}

$conn->close();

*/



// secure.php
// Safe example using PDO and prepared statements

$host = '127.0.0.1';
$db   = 'test_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // use native prepares when available
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // don't reveal DB errors in production; log them instead
    die('Database connection failed.');
}

// Get the username from user input (GET/POST)
$username = isset($_GET['username']) ? $_GET['username'] : '';

// Prepare statement with a named placeholder
$sql = "SELECT id, name, email FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);

// Bind and execute
$stmt->execute([':username' => $username]);

$rows = $stmt->fetchAll();

if ($rows) {
    foreach ($rows as $row) {
        echo 'ID: ' . htmlspecialchars($row['id']) . '<br>';
        echo 'Name: ' . htmlspecialchars($row['name']) . '<br>';
        echo 'Email: ' . htmlspecialchars($row['email']) . '<br>';
    }
} else {
    echo "No user found.";
}

?>
