<?php
// Set response type
header('Content-Type: application/json');

// Name of the custom header
$customHeaderName = 'HTTP_X_CUSTOM_HEADER';

// Check if the header exists
if (isset($_SERVER[$customHeaderName])) {
    $headerValue = $_SERVER[$customHeaderName];
    echo json_encode([
        'success' => true,
        'message' => 'Custom header received successfully.',
        'header_value' => $headerValue
    ]);
    
} else {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Missing custom header: X-Custom-Header'
    ]);
}
?>
