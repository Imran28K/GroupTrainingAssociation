<?php
$OTP = random_int(000000,999999);
$stringOTP = strval($OTP);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'imran28may@gmail.com';
        $mail->Password = 'eahqppsbctocrcxg'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('epicguys621@gmail.com', 'Joe Denton');
        $mail->addAddress('jdenton1404@gmail.com'); // Add a recipient
        $mail->isHTML(true);
        $mail->Subject = "Your One Time Password";
        $mail->Body = "Your One Time Password is: " . $stringOTP ;

        $mail->send();
        echo "<script>alert('Sent Successfully'); document.location.href = '../index.php';</script>"; // Redirect back to the form page or a 'success' page
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); document.location.href = '../index.php';</script>"; // Redirect back to the form page or an 'error' page
    }

echo $OTP;
?>