<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Instantiate PHPMailer
    $mail = new PHPMailer();

    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'carladeric0019@gmail.com'; // Your Gmail address
    $mail->Password = 'Aderic0019'; // Your Gmail password or App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and Recipient
    $mail->setFrom($email, $name);
    $mail->addAddress('carladeric0019@gmail.com'); // Recipient's email

    // Email Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    if ($mail->send()) {
        echo '<script>alert("Message sent successfully.");</script>';
    } else {
        echo '<script>alert("Failed to send message. Please try again later.");</script>';
    }
} else {
    // Handle invalid form submission
    echo '<script>alert("Invalid form submission.");</script>';
}
?>
