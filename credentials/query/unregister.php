<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $learnerID = $_POST['learnerID'];
    $sessionID = $_POST['sessionID'];
    $learnerIDString = sprintf($learnerID);
    $sessionIDString = sprintf($sessionID);
    $userRole = $_SESSION['userRole'];

    $queryAttended= "UPDATE attendance SET present = 'No' WHERE UniqueLearnerNumber = '$learnerIDString' AND sessionID = '$sessionIDString'";
    $resultAttended = $mysqli->query($queryAttended);
    if ($userRole == "tutor"){
        header('location:../../users/tutor/registerAttendance.php');
    }
    else if ($userRole == "admin") {
        header('location:../../users/admin/registerAttendanceAdmin.php');
    }
}
?>