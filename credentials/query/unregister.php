<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $learnerID = $_POST['learnerID'];
    $sessionID = $_POST['sessionID'];
    $learnerIDString = sprintf($learnerID);
    $sessionIDString = sprintf($sessionID);

    $queryAttended= "UPDATE attendance SET present = 'No' WHERE UniqueLearnerNumber = '$learnerIDString' AND sessionID = '$sessionIDString'";
    $resultAttended = $mysqli->query($queryAttended);
    header('location:http://localhost/GroupTrainingAssociation/pages/registerAttendance.php');
}

?>