<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ExpectedHours'], $_POST['TrainingCenterHours'], $_POST['EmployerTrainingRecords'], $_POST['GTASpecialistTraining'], $_POST['VLETraining'], $_POST['Password'], $_POST['learnerID'])) {
    $expectedHours = $_POST['ExpectedHours'];
    $trainingCenterHours = $_POST['TrainingCenterHours'];
    $employerTrainingRecords = $_POST['EmployerTrainingRecords'];
    $GTASpecialistTraining = $_POST['GTASpecialistTraining'];
    $VLETraining = $_POST['VLETraining'];
    $password = $_POST['Password'];
    $learnerID = $_POST['learnerID'];

    $queryPasswordCheck = "SELECT * FROM tutor WHERE TutorPassword = '$password' AND TutorID = '$userID'"; 
    $resultPasswordCheck = $mysqli->query($queryPasswordCheck);
    $row_count = $resultPasswordCheck -> num_rows;

    if ($row_count == 1) {
        $cumulativeHours = $trainingCenterHours + $employerTrainingRecords + $GTASpecialistTraining + $VLETraining;

        $queryOTJ = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$learnerID'"; 
        $resultOTJ = $mysqli->query($queryOTJ);
        $row_count = $resultOTJ -> num_rows;

        if ($row_count > 0){
            $queryHours = "UPDATE otjhours SET ExpectedHours = $expectedHours, TrainingCenterHours = $trainingCenterHours, EmployerTrainingRecords = $employerTrainingRecords, GTASpecialistTraining = $GTASpecialistTraining, VLETraining = $VLETraining, TotalHours = $cumulativeHours, CumulativeHours = $cumulativeHours, SignedOffBy = $userID WHERE UniqueLearnerNumber = '$learnerID'";
            $resultHours = $mysqli->query($queryHours);
        }
        else if ($row_count <= 0) {
            $queryHours = "INSERT INTO otjhours (UniqueLearnerNumber, ExpectedHours, TrainingCenterHours, EmployerTrainingRecords, GTASpecialistTraining, VLETraining, TotalHours, CumulativeHours, SignedOffBy) VALUES ('$learnerID', $expectedHours, $trainingCenterHours, $employerTrainingRecords, $GTASpecialistTraining, $VLETraining, $cumulativeHours, $cumulativeHours, $userID)";
            $resultHours = $mysqli->query($queryHours);
        }

        $msg = "UpdatedHours";
        if ($details -> Role == "Admin"){
            header("location: ../admin/viewOTJAdmin.php");
        }
        else if ($details -> Role == "Tutor"){
            header("location: ../tutor/viewOTJTutor.php");
        }
    }
    else {
        echo" the password you put in was incorrect";
        echo"<ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='../admin/viewOTJAdmin.php'> Back </a> </li>
        </ul>";
    }
}
?>