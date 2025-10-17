<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer manually (from your extracted folder)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

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
              $mail->Password   = 'hjkh woxd beee ptim';        // Gmail App Password
              $mail->SMTPSecure = 'tls';                      // or 'ssl'
              $mail->Port       = 587;                        // 465 for SSL

            // Sender & recipient
            $mail->setFrom('pujara201@gmail.com', 'princetech');
            $mail->addAddress($email, $name);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Registration Confirmation';
            $mail->Body    = "
                <h2>Welcome, $name!</h2>
                <p>Thank you for registering with us.</p>
                <p>Your account has been created successfully.</p>
                <br>
                <p>Regards,<br><b>Princetech</b></p>
            ";
            $mail->AltBody = "Welcome $name! Thank you for registering with us.";

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
    <title>User Registration with Email Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 col-md-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-3">Register</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>

</body>
</html>
