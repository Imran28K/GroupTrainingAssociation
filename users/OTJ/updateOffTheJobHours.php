<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['TrainingCenterHours'], $_POST['EmployerTrainingRecords'], $_POST['GTASpecialistTraining'], $_POST['VLETraining'], $_POST['learnerID'])) {
    $trainingCenterHours = $_POST['TrainingCenterHours'];
    $employerTrainingRecords = $_POST['EmployerTrainingRecords'];
    $GTASpecialistTraining = $_POST['GTASpecialistTraining'];
    $VLETraining = $_POST['VLETraining'];
    $learnerID = $_POST['learnerID'];

    $cumulativeHours = $trainingCenterHours + $employerTrainingRecords + $GTASpecialistTraining + $VLETraining;

        $queryOTJ = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$learnerID'"; 
        $resultOTJ = $mysqli->query($queryOTJ);
        $row_count = $resultOTJ -> num_rows;

        if ($row_count > 0){
            $queryHours = "UPDATE otjhours SET TrainingCenterHours = $trainingCenterHours, EmployerTrainingRecords = $employerTrainingRecords, GTASpecialistTraining = $GTASpecialistTraining, VLETraining = $VLETraining, TotalHours = $cumulativeHours, CumulativeHours = $cumulativeHours WHERE UniqueLearnerNumber = '$learnerID'";
            $resultHours = $mysqli->query($queryHours);
        }
        else if ($row_count <= 0) {
            $queryHours = "INSERT INTO otjhours (UniqueLearnerNumber, TrainingCenterHours, EmployerTrainingRecords, GTASpecialistTraining, VLETraining, TotalHours, CumulativeHours) VALUES ('$learnerID', $trainingCenterHours, $employerTrainingRecords, $GTASpecialistTraining, $VLETraining, $cumulativeHours, $cumulativeHours)";
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
?>