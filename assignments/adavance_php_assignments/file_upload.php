<?php

echo "Questions: Create a file upload feature that allows users to upload images.
 Ensure that theuploaded images are checked for file type and size for security". "<br><br>";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="upload_handler.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>


