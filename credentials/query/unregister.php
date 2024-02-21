<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $learnerID = $_POST['learnerID'];
    $learnerIDString = sprintf($learnerID);

    $queryAttended= "UPDATE attendance SET present = 'No' WHERE UniqueLearnerNumber = '$learnerIDString'";
    $resultAttended = $mysqli->query($queryAttended);
    header('location:http://localhost/GroupTrainingAssociation/pages/registerAttendance.php');
}

?>