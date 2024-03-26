<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'], $_POST['tutorID'])) {
    $newPassword = $_POST['password'];
    $tutorID = $_POST['tutorID'];

    if ($newPassword) {
        $sql = "UPDATE tutor SET TutorPassword = ? WHERE TutorID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $newPassword, $tutorID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Password updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating Password.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    } else {
        $_SESSION['error_message'] = 'Invalid Password format.';
    }
            //setting a success message.
        $msg = "Password Changed Successfully";
        header("location: ../../users/admin/admin.php?msg=$msg");
    //mysqli_close($mysqli);
    //header("Location: learnerinfo.php"); // Redirect back to the learnerinfo page
    //exit();
}
?>