<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>
    <a href="display_products.php" class="btn btn-secondary mb-3">← Continue Shopping</a>
    
    <?php if (!empty($cart)): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Price (₹)</th>
                    <th>Quantity</th>
                    <th>Subtotal (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= number_format($item['price'], 2) ?></td>
                        <td>
                            <form action="cart.php" method="POST" class="d-flex">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control form-control-sm me-2" style="width:70px;">
                                <button type="submit" name="action" value="update" class="btn btn-success btn-sm">Update</button>
                            </form>
                        </td>
                        <td><?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" name="action" value="remove" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: ₹<?= number_format($total, 2) ?></h4>
            <button class="btn btn-primary mt-3">Proceed to Checkout</button>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">Your cart is empty.</div>
    <?php endif; ?>
</div>
</body>
</html>
