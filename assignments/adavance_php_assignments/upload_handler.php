<?php
// Set upload directory
$targetDir = "uploads/";

// Check if directory exists
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Check if file is uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES["image"]["tmp_name"];
    $fileName = basename($_FILES["image"]["name"]);
    $fileSize = $_FILES["image"]["size"];
    $fileType = mime_content_type($fileTmpPath);

    // Allowed MIME types
    $allowedTypes = ["image/jpeg", "image/png", "image/gif"];

    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        die("❌ Only JPG, PNG, and GIF files are allowed.");
    }

    // Validate file size (max 2 MB)
    if ($fileSize > 2 * 1024 * 1024) {
        die("❌ File size must be under 2MB.");
    }

    // Generate a safe file name to prevent conflicts or script injection
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $safeFileName = uniqid("img_", true) . "." . strtolower($fileExt);

    // Full path to store
    $destination = $targetDir . $safeFileName;

    // Move uploaded file to final destination
    if (move_uploaded_file($fileTmpPath, $destination)) {
        echo "✅ File uploaded successfully!<br>";
        echo "<img src='$destination' width='300'>";
    } else {
        echo "❌ Error uploading file.";
    }
} else {
    echo "❌ No file uploaded or upload error.";
}
?>
