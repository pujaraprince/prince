<?php

echo "Questions: Write a PHP script that validates user inputs (username, password, email)
using regular expressions, providing feedback on any validation errors.". "<br><br>";

?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer manually (from your extracted folder)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format.</p>";
    } else {
        // Normally insert user data into your database here
        // Example: $conn->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')");

        // Now send confirmation email using Gmail SMTP via PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration
              $mail->isSMTP();
              $mail->Host       = 'smtp.gmail.com';
              $mail->SMTPAuth   = true;
              $mail->Username   = 'pujara201@gmail.com';      // Your Gmail address
              $mail->Password   = '#';        // Gmail App Password
              $mail->SMTPSecure = 'tls';                      // or 'ssl'
              $mail->Port       = 587;                        // 465 for SSL

            // Sender & recipient
            $mail->setFrom('pujara201@gmail.com', 'princetech');
            $mail->addAddress($email, $username);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Registration Confirmation';
            $mail->Body    = "
                <h2>Welcome, $username!</h2>
                <p>Thank you for registering with us.</p>
                <p>Your account has been created successfully.</p>
                <br>
                <p>Regards,<br><b>Princetech</b></p>
            ";
            $mail->AltBody = "Welcome $username! Thank you for registering with us.";

            // Send email
            $mail->send();
            echo "<p style='color:green;'>Registration successful! A confirmation email has been sent to <b>$email</b>.</p>";
        } catch (Exception $e) {
            echo "<p style='color:red;'>Registration successful, but email could not be sent.<br>Error: {$mail->ErrorInfo}</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Input Validation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
<h2>User Registration Form</h2>

<form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br><br>

    <input type="submit" value="Validate">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);

    $errors = [];

    //  Username Validation: 5–15 characters, letters, numbers, underscore only
    if (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
        $errors[] = "Username must be 5–15 characters long and contain only letters, numbers, and underscores.";
    }

    //  Password Validation:
    // Minimum 8 chars, at least 1 uppercase, 1 lowercase, 1 number, 1 special char
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.";
    }

    //  Email Validation: regex + filter_var fallback
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Z|a-z]{2,}$/", $email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    //  Display results
    if (empty($errors)) {
        echo "<p class='success'> All inputs are valid! Registration successful.</p>";
    } else {
        echo "<div class='error'><b>Validation Errors:</b><ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul></div>";
    }
}
?>
</body>
</html>
