
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../../db/dbconnection.php';
$userEmail = $_POST['email'];

// Define an associative array mapping tables to their email columns
$tableColumnMapping = [
    'learner' => 'LearnerEmail',
    'tutor' => 'TutorEmail',
    'employer' => 'EmployerEmail'
];

$emailFound = false;
$tableFound = '';

foreach ($tableColumnMapping as $table => $emailColumn) {
    
    $query = "SELECT * FROM {$table} WHERE {$emailColumn} = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        // Bind the user email to the query and execute
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            
            $emailFound = true;
            $tableFound = $table;
            break; 
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for table $table: " . $mysqli->error;
    }
}

if ($emailFound) {
    $OTP = random_int(000000, 999999);
    $stringOTP = strval($OTP);
    require '../../phpmailer/src/Exception.php';
    require '../../phpmailer/src/PHPMailer.php';
    require '../../phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Set mailer to use SMTP, configure settings...
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'imran28may@gmail.com';
        $mail->Password = 'eahqppsbctocrcxg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('imran28may@gmail.com', 'GTAReset');
        $mail->addAddress($userEmail); // Add the user's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your one time password';
        $mail->Body    = 'Your One Time Password is: ' . $stringOTP;

        $mail->send();
        // Redirect to forgotpassword.php with a success message
        header('Location: ../forgotpassword.php?emailSent=true');
        exit();
    } catch (Exception $e) {
        // Handle email sending failure
        header('Location: ../forgotpassword.php?emailSent=false');
        exit();
    }

} else {
    header('Location: ../forgotpassword.php?emailNotFound=true');
    exit();
    
}

?>




