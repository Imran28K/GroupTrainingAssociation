<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employerID'])) {
    $employerID = $_POST['employerID'];

    // Update Employer First Name and Last Name
    if (isset($_POST['employerFirstName'], $_POST['employerLastName'])) {
        $newFirstName = $_POST['employerFirstName'];
        $newLastName = $_POST['employerLastName'];

        $sql = "UPDATE employer SET EmployerFirstName = ?, EmployerLastName = ? WHERE EmployerID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $newFirstName, $newLastName, $employerID);
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

    // Update Employer Email Address
    if (isset($_POST['email'])) {
        $newEmail = $_POST['email'];

        $sql = "UPDATE employer SET EmployerEmail = ? WHERE EmployerID = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $newEmail, $employerID);
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

    // Redirect back to the employer details page
    header("location: ../../users/admin/edit-employer.php");
    exit();
} else {
    // If no POST data is received, redirect back to the employer details page
    header("location: ../../users/admin/edit-employer.php");
    exit();
}
?>
