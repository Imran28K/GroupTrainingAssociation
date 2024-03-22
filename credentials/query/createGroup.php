<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $unitName = $_POST['unitName'];
    $date = $_POST['date'];
    $userRole = $_SESSION['userRole'];

    $queryUnits = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$unitName', '$date')";
    $resultUnits = $mysqli->query($queryUnits);
    
    header('location:../../users/admin/addKSBGroups.php');
}

?>