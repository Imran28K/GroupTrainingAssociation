<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['learnerID'])) {
    $Email = $_POST['email'];
    $learnerID = $_POST['learnerID'];

    if ($Email != "") {
        $queryAssignTutor = "UPDATE learner SET LearnerEmail = '$Email' WHERE UniqueLearnerNumber = '$learnerID'";
        $resultAssignTutor = $mysqli->query($queryAssignTutor);
        echo"successful";

        $msg = "Tutor assigned";
        header("location: ../../users/admin/assigningTutors.php");
    }
    else {
        echo" The name of the tutor you have input was either spelt incorrectly or does not exist";
    }

// Define an associative array mapping tables to their email and password columns
$emailFound = false;
$tableFound = '';

foreach ($tableColumnMapping as $table => $columns) {
    $query = "SELECT * FROM {$table} WHERE {$columns['LearnerEmail']} = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('s', $Email);
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
        $mail->Username = 'gtapwverify@gmail.com'; // SMTP username
        $mail->Password = 'nzhjaazofjjtnkad'; // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('gtapwverify@gmail.com', 'GTAReset');
        $mail->addAddress($Email);

        $mail->isHTML(true);
        $mail->Subject = 'Your one-time password';
        $mail->Body    = 'Your One Time Password is: ' . $stringOTP;

        $mail->send();

        // Update the password in the database for the found table and email
        $passwordColumn = $tableColumnMapping[$tableFound]['passwordColumn'];
        $updateQuery = "UPDATE {$tableFound} SET {$passwordColumn} = ? WHERE {$tableColumnMapping[$tableFound]['emailColumn']} = ?";
        $updateStmt = $mysqli->prepare($updateQuery);

        if ($updateStmt) {
            $updateStmt->bind_param('ss', $stringOTP, $Email);
            $updateStmt->execute();
            $updateStmt->close();
        } else {
            echo "Error preparing update statement for table $tableFound: " . $mysqli->error;
        }

        header('Location: ../../users/admin/setEmail.php?emailSent=true');
        exit();
    } catch (Exception $e) {
        header('Location: ../../users/admin/setEmail.php?emailSent=false');
        exit();
    }
} else {
    header('Location: ../../users/admin/setEmail.php?emailNotFound=true');
    exit();
}
}
else {
    echo"You need to input an email";
}
?>