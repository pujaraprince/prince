<?php
require_once "./controllers/UserController.php";

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $controller->create($name, $email);
} else {
    $controller->index();
}
?>
