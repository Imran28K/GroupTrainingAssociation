<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tutorID'])) {
    $tutorID = $_POST['tutorID'];

    // Update Tutor First Name and Last Name
    if (isset($_POST['tutorFirstName'], $_POST['tutorLastName'])) {
        $newFirstName = $_POST['tutorFirstName'];
        $newLastName = $_POST['tutorLastName'];

        $sql = "UPDATE tutor SET TutorFirstName = ?, TutorLastName = ? WHERE TutorID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $newFirstName, $newLastName, $tutorID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Name updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating name.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    }

    // Update Email Address
    if (isset($_POST['email'])) {
        $newEmail = $_POST['email'];

        $sql = "UPDATE tutor SET TutorEmail = ? WHERE TutorID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $newEmail, $tutorID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Email address updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating email address.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    }

    // Redirect back to edit-tutor.php
    header("location: ../../users/admin/edit-tutor.php");
    exit();
} else {
    // If no POST data is received, redirect back to edit-tutor.php
    header("location: ../../users/admin/edit-tutor.php");
    exit();
}
?>
