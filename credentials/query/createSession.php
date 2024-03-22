<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $date = $_POST['date'];
    $timeStart = $_POST['timeStart'];
    $timeEnd = $_POST['timeEnd'];
    $apprenticeship = $_POST['apprenticeship'];
    $timeStartString = sprintf($timeStart);
    $timeEndString = sprintf($timeEnd);
    $userRole = $_SESSION['userRole'];

    $querySession = "INSERT INTO registerSessions (SessionDate, TimeStart, TimeEnd, apprenticeshipName) VALUES ('$date', '$timeStartString', '$timeEndString', '$apprenticeship')";
    $resultSession = $mysqli->query($querySession);
    if ($userRole == "tutor"){
        header('location:../../users/tutor/attendanceLanding.php');
    }
    else if ($userRole == "admin") {
        header('location:../../users/admin/attendanceLandingAdmin.php');
    }
}

?>