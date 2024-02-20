<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $timeStart = $_POST['timeStart'];
    $timeEnd = $_POST['timeEnd'];
    $timeStartString = sprintf($timeStart);
    $timeStartFinal= str_replace(':', '.', $timeStartString);
    $timeEndString = sprintf($timeEnd);
    $timeEndFinal = str_replace(':', '.', $timeEndString);
    echo $date;

    $querySession = "INSERT INTO registerSessions (SessionDate, TimeStart, TimeEnd) VALUES ('$date', '$timeStartString', '$timeEndString')";
    $resultSession = $mysqli->query($querySession);
}

?>