<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $timeStart = $_POST['timeStart'];
    $timeEnd = $_POST['timeEnd'];
    $timeStartString = sprintf($timeStart);
    $timeEndString = sprintf($timeEnd);

    $querySession = "INSERT INTO registerSessions (SessionDate, TimeStart, TimeEnd) VALUES ('$date', '$timeStartString', '$timeEndString')";
    $resultSession = $mysqli->query($querySession);
}

?>