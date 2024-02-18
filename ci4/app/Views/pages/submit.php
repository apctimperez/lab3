<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.your-email-provider.com';  // Change this to your email provider's SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@email.com';  // Change this to your email address
        $mail->Password   = 'your-email-password';  // Change this to your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;  // Change this according to your email provider

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('your@example.com');  // Change this to your email address

        // Content
        $mail->isHTML(false);  // Set to true if you want to send HTML-formatted emails
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo "<p>Thank you for contacting us, $name! We will get back to you shortly.</p>";
    } catch (Exception $e) {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
} else {
    // Redirect to the contact page if accessed directly
    header("Location: contact.html");
    exit();
}
?>
