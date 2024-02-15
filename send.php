<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) { // Changed from "submit" to "send" to match the button name in index.php
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'imran28may@gmail.com'; // Consider using environment variables or a configuration file for credentials
        $mail->Password = 'eahqppsbctocrcxg'; // Consider using environment variables or a configuration file for credentials
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('imran28may@gmail.com', 'Your Name');
        $mail->addAddress($_POST["email"]); // Add a recipient
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();
        echo "<script>alert('Sent Successfully'); document.location.href = 'index.php';</script>"; // Redirect back to the form page or a 'success' page
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); document.location.href = 'index.php';</script>"; // Redirect back to the form page or an 'error' page
    }
}
