<?php
// Set response type
header('Content-Type: application/json');

// Directory where uploaded files will be stored
$targetDir = "uploads/";

// Create directory if not exists
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if file was uploaded
if (!isset($_FILES['file'])) {
    echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
    exit;
}

$file = $_FILES['file'];

// Validate for errors
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Upload error occurred.']);
    exit;
}

// Validate file size (max 2MB)
$maxSize = 2 * 1024 * 1024; // 2MB
if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'message' => 'File size exceeds 2MB limit.']);
    exit;
}

// Allowed file types (images and PDFs)
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($fileExtension, $allowedTypes)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, GIF, and PDF allowed.']);
    exit;
}

// Generate a unique file name
$newFileName = uniqid("upload_", true) . '.' . $fileExtension;
$targetFile = $targetDir . $newFileName;

// Move the file
if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    echo json_encode([
        'success' => true,
        'message' => 'File uploaded successfully.',
        'file_name' => $newFileName,
        'file_path' => $targetFile
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
}
?>
.