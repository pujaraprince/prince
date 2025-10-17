<?php

echo "Questions: Implement try-catch blocks in a PHP script to handle exceptions for database
 connectionandquery execution.". "<br><br>";

?>

<?php
// Database configuration
$host = "localhost";
$dbname = "customer";
$username = "root";
$password = "";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected successfully!<br>";

    // Example query execution inside try-catch
    try {
        // Example SQL statement
        $sql = "SELECT * FROM customer";

        // Execute the query
        $stmt = $conn->query($sql);

        // Fetch all rows
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display results
        if ($results) {
            foreach ($results as $row) {
                echo "👤 User: " . htmlspecialchars($row['cust_username']) . "<br>";
            }
        } else {
            echo " No users found.";
        }

    } catch (PDOException $e) {
        // Handle query errors
        echo " Query failed: " . $e->getMessage();
    }

} catch (PDOException $e) {
    // Handle connection errors
    echo " Connection failed: " . $e->getMessage();
}

// Close the connection (optional in PDO)
$conn = null;
?>
