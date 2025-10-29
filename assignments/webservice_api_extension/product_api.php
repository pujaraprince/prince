<?php
// RESTful API - Fetch Product Details with Error Handling

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

require 'db.php'; // Include DB connection

$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 405,
            'message' => 'Method Not Allowed. Use GET.'
        ]
    ]);
    exit;
}

try {
    // Validate ID parameter if provided
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (!is_numeric($id) || $id <= 0) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => 'Invalid product ID. It must be a positive number.'
                ]
            ]);
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo json_encode([
                'success' => true,
                'data' => $product
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => 'Product not found.'
                ]
            ]);
        }
    } else {
        // Fetch all products
        $stmt = $conn->query("SELECT * FROM products WHERE status = 'active' ORDER BY id DESC");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($products) > 0) {
            echo json_encode([
                'success' => true,
                'count' => count($products),
                'data' => $products
            ]);
        } else {
            http_response_code(204); // No content
            echo json_encode([
                'success' => true,
                'message' => 'No active products found.',
                'data' => []
            ]);
        }
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 500,
            'message' => 'Database error occurred.',
            'details' => $e->getMessage() // Remove in production
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 500,
            'message' => 'Unexpected server error.',
            'details' => $e->getMessage() // Remove in production
        ]
    ]);
}
?>
