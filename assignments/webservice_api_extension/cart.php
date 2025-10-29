<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = (int)$_POST['quantity'];
    $action = $_POST['action'];

    switch ($action) {
     //   Add product
     
        case 'add':
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$id] = [
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'quantity' => $quantity
                ];
            }
            break;

        // Update quantity
        case 'update':
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
            break;

        //  Remove product
        case 'remove':
            unset($_SESSION['cart'][$id]);
            break;
    }

    header('Location: view.php');
    exit;
}
?>
