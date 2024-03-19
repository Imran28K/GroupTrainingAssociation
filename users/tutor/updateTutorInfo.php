<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['tutorID'])) {
    $newEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $TutorID = $_POST['tutorID'];

    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE tutor SET TutorEmail = ? WHERE TutorID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $newEmail, $TutorID);
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
        $msg = "Email Changed Successfully";
        header("location: tutor.php?msg=$msg");
}
?>