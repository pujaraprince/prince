<?php
require_once "./models/User.php";
require_once "./config/database.php";

class UserController {
    private $db;
    private $model;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->model = new User($this->db);
    }

    // Show all users
    public function index() {
        $stmt = $this->model->getAllUsers();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "./views/user_view.php";
    }

    // Add new user
    public function create($name, $email) {
        if ($this->model->addUser($name, $email)) {
            echo "<div class='alert alert-success'> User added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'> Failed to add user!</div>";
        }
        $this->index();
    }
}
?>
