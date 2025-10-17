<?php

echo "Questions: Write a class Database that handles database connections and queries.
 Usethis class in another script to fetch user data from a users table". "<br><br>";

?>

<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "test_db";
    private $conn;

    // Constructor - create connection automatically
    public function __construct() {
        $this->connect();
    }

    // Establish database connection
    private function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }

    // Execute SELECT queries
    public function select($query) {
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC); // return array of data
        } else {
            return [];
        }
    }

    // Execute INSERT, UPDATE, DELETE queries
    public function execute($query) {
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
            return false;
        }
    }

    // Close the connection
    public function close() {
        $this->conn->close();
    }
}
?>
