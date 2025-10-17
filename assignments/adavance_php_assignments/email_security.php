<?php

echo "Questions: Write a function that sanitizes email input and
 validates it before sending". "<br><br>";

?>

<?php
function validateEmail($email) {
    // Step 1: Sanitize the email input
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Step 2: Validate the sanitized email
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        echo " Valid email address: $sanitizedEmail<br>";
        return true;
    } else {
        echo " Invalid email address: $sanitizedEmail<br>";
        return false;
    }
}

// Example usage
$email1 = "user@example.com";
$email2 = "invalid-email@@example";

validateEmail($email1);
validateEmail($email2);
?>
