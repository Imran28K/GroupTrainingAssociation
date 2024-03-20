<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$queryEmployer = "SELECT * FROM employer WHERE EmployerID = '$userID'"; 
$resultEmployer = $mysqli->query($queryEmployer);

$details = $resultEmployer -> fetch_object();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['EmployerName'], $_POST['learnerID'])) {
    $EmployerName = $_POST['EmployerName'];
    $learnerID = $_POST['learnerID'];
    [$EmployerFirstName, $EmployerLastName] = explode(' ', $EmployerName);

    if ($EmployerFirstName != "" && $EmployerLastName != "") {
        $queryAssigningEmployer = "SELECT * FROM employer WHERE EmployerFirstName = '$EmployerFirstName' AND EmployerLastName = '$EmployerLastName'"; 
        $resultAssigningEmployer = $mysqli->query($queryAssigningEmployer); 
        $getEmployerID = $resultAssigningEmployer -> fetch_object();
        $EmployerID = $getEmployerID -> EmployerID;
        $check = $resultAssigningEmployer -> num_rows;

        if ($check > 0){
            $queryAssignEmployer = "UPDATE employer SET EmployerID = $EmployerID WHERE UniqueLearnerNumber = '$learnerID'";
            $resultAssignEmployer = $mysqli->query($queryAssignEmployer);
            echo"successful";
    
            $msg = "Employer assigned";
            header("location: ../../users/admin/assign-employer.php");
        }
        else {
            echo" an error has occured";
        }
    }
    else {
        echo" The name of the employer you have input was either spelt incorrectly or does not exist";
    }
}
else {
    echo"The name of the employer you have input was either spelt incorrectly or does not exist";
}
?>