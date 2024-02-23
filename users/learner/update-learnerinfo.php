<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['learnerID'])) {
    $newEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $learnerID = $_POST['learnerID'];

    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE learner SET LearnerEmail = ? WHERE UniqueLearnerNumber = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $newEmail, $learnerID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Email updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating email.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    } else {
        $_SESSION['error_message'] = 'Invalid email format.';
    }
            //setting a success message.
        $msg = "Email Changed Successfully";
        header("location: learnerinfo.php?msg=$msg");
    //mysqli_close($mysqli);
    //header("Location: learnerinfo.php"); // Redirect back to the learnerinfo page
    //exit();
}
?>