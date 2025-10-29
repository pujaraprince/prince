<?php
session_start();
require 'db.php';

// Fetch all active products
$stmt = $conn->query("SELECT * FROM tbl_product ");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">🛍️ Available Products</h2>
    <div class="text-end mb-3">
        <a href="view_cart.php" class="btn btn-warning">🛒 View Cart (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</a>
    </div>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                   
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                        <p class="text-success fw-bold">₹<?= number_format($product['product_price'], 2) ?></p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($product['product_name']) ?>">
                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width:80px; margin:auto;">
                            <button type="submit" name="action" value="add" class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
