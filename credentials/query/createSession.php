<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $timeStart = $_POST['timeStart'];
    $timeEnd = $_POST['timeEnd'];
    $apprenticeship = $_POST['apprenticeship'];
    $timeStartString = sprintf($timeStart);
    $timeEndString = sprintf($timeEnd);

    $querySession = "INSERT INTO registerSessions (SessionDate, TimeStart, TimeEnd, apprenticeshipName) VALUES ('$date', '$timeStartString', '$timeEndString', '$apprenticeship')";
    $resultSession = $mysqli->query($querySession);
    header('location:http://localhost/GroupTrainingAssociation/attendance/registerChoice.php');
}

?>