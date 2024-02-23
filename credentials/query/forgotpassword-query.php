<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../../db/dbconnection.php';
$userEmail = $_POST['email'];

// Define an associative array mapping tables to their email and password columns
$tableColumnMapping = [
    'learner' => ['emailColumn' => 'LearnerEmail', 'passwordColumn' => 'LearnerPassword'],
    'tutor' => ['emailColumn' => 'TutorEmail', 'passwordColumn' => 'TutorPassword'],
    'employer' => ['emailColumn' => 'EmployerEmail', 'passwordColumn' => 'EmployerPassword']
];

$emailFound = false;
$tableFound = '';

foreach ($tableColumnMapping as $table => $columns) {
    $query = "SELECT * FROM {$table} WHERE {$columns['emailColumn']} = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
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
    $OTP = random_int(100000, 999999); // Ensure the OTP is always 6 digits
    $stringOTP = strval($OTP);
    require '../../phpmailer/src/Exception.php';
    require '../../phpmailer/src/PHPMailer.php';
    require '../../phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Mail setup...
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'imran28may@gmail.com'; // SMTP username
        $mail->Password = 'eahqppsbctocrcxg'; // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('imran28may@gmail.com', 'GTAReset');
        $mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Your one-time password';
        $mail->Body    = 'Your One Time Password is: ' . $stringOTP;

        $mail->send();

        // Update the password in the database for the found table and email
        $passwordColumn = $tableColumnMapping[$tableFound]['passwordColumn'];
        $updateQuery = "UPDATE {$tableFound} SET {$passwordColumn} = ? WHERE {$tableColumnMapping[$tableFound]['emailColumn']} = ?";
        $updateStmt = $mysqli->prepare($updateQuery);

        if ($updateStmt) {
            $updateStmt->bind_param('ss', $stringOTP, $userEmail);
            $updateStmt->execute();
            $updateStmt->close();
        } else {
            echo "Error preparing update statement for table $tableFound: " . $mysqli->error;
        }

        header('Location: ../forgotpassword.php?emailSent=true');
        exit();
    } catch (Exception $e) {
        header('Location: ../forgotpassword.php?emailSent=false');
        exit();
    }
} else {
    header('Location: ../forgotpassword.php?emailNotFound=true');
    exit();
}
?>






