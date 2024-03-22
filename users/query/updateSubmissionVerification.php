<?php
session_start();
require_once '../../db/dbconnection.php';

if (isset($_POST['unitId'], $_POST['password'], $_POST['userId'])) {
    $unitId = $_POST['unitId'];
    $password = $_POST['password'];
    $userId = $_POST['userId'];

    
    $stmt = $mysqli->prepare("SELECT TutorPassword FROM tutor WHERE TutorID = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $tutor = $result->fetch_assoc();
        
        
        if ($password === $tutor['TutorPassword']) {
            
            $updateStmt = $mysqli->prepare("UPDATE progressunits SET CurrentStatus = 'Completed' WHERE UnitID = ? AND ProgressID = ?");
            $updateStmt->bind_param("si", $unitId, $progressID);
            
            if ($updateStmt->execute()) {
                echo "Task marked as completed.";
            } else {
                echo "Failed to update task status.";
            }
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Tutor not found.";
    }
    $stmt->close();
} else {
    echo "Required parameters are missing.";
}
?>
