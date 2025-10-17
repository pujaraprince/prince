<?php
class User {
    private $conn;
    private $table = "users";

    public $id;
    public $name;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all users
    public function getAllUsers() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Add a new user
    public function addUser($name, $email) {
        $query = "INSERT INTO " . $this->table . " (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }
}
?>
