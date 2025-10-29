<?php
header('Content-Type: application/json');
require 'db.php';

// Get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Handle CRUD
switch ($method) {

    // CREATE Product
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['name']) || !isset($data['price'])) {
            echo json_encode(['success' => false, 'message' => 'Name and price are required.']);
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO tbl_product (name, price, description) VALUES (?, ?, ?)");
        $stmt->execute([$data['name'], $data['price'], $data['description'] ?? null]);

        echo json_encode(['success' => true, 'message' => 'Product created successfully.']);
        break;

    // READ Product(s)
    case 'GET':
        if (isset($_GET['id'])) {
            // Single product
            $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            echo json_encode($product ? $product : ['message' => 'Product not found']);
        } else {
            // All products
            $stmt = $conn->query("SELECT * FROM tbl_product ORDER BY id DESC");
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($products);
        }
        break;

    // UPDATE Product
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Product ID is required.']);
            exit;
        }

        $stmt = $conn->prepare("UPDATE tbl_product SET name = ?, price = ?, description = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['price'], $data['description'] ?? null, $data['id']]);

        echo json_encode(['success' => true, 'message' => 'Product updated successfully.']);
        break;

    //  DELETE Product
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['id'])) {
            echo json_encode(['success' => false, 'message' => 'Product ID is required.']);
            exit;
        }

        $stmt = $conn->prepare("DELETE FROM tbl_product WHERE id = ?");
        $stmt->execute([$data['id']]);

        echo json_encode(['success' => true, 'message' => 'Product deleted successfully.']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
