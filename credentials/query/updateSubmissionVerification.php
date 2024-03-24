<?php
session_start();
require_once '../../db/dbconnection.php';

if (isset($_POST['unitId'], $_POST['password'], $_POST['progressId'])) {
    $unitId = $_POST['unitId'];
    $password = $_POST['password'];
    $progressId = $_POST['progressId'];
    $userId = $_SESSION['userID'];
    $role = $_SESSION['userRole'];
    
    $stmt = $mysqli->prepare("SELECT TutorPassword FROM tutor WHERE TutorID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $tutor = $result->fetch_assoc();
        
        if ($password === $tutor['TutorPassword']) {
            // Update the CurrentStatus to 'Completed'
            $updateStmt = $mysqli->prepare("UPDATE progressunits SET CurrentStatus = 'Completed' WHERE UnitID = ? AND ProgressID = ?");
            $updateStmt->bind_param("si", $unitId, $progressId);
            if ($updateStmt->execute()) {
                $_SESSION['message'] = "Task marked as completed.";
            } else {
                $_SESSION['error'] = "Failed to update task status.";
            }
        } else {
            $_SESSION['error'] = "Incorrect password. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Tutor not found.";
    }
    $stmt->close();
    if ($role == 'admin'){
        header("Location: ../../users/admin/manageSubmissionAdmin.php");
    } 
    else if ($role == 'tutor'){
        header("Location: ../../users/tutor/manageSubmissions.php");
    } 
    exit();
} else {
    $_SESSION['error'] = "Required parameters are missing.";
    if ($role == 'admin'){
        header("Location: ../../users/admin/manageSubmissionAdmin.php");
    } 
    else if ($role == 'tutor'){
        header("Location: ../../users/tutor/manageSubmissions.php");
    } 
    exit();
}
?>

