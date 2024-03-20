<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();
    $learnerID = $_POST['learnerID'];
    $apprenticeshipName = $_POST['ApprenticeshipName']; $numberOfYears = $_POST['NumberOfYears'];
    $group1 = $_POST['Group1'];  $group1SubmissionDate = $_POST['Group1SubmissionDate'];
    $group2 = $_POST['Group2'];  $group2SubmissionDate = $_POST['Group2SubmissionDate'];
    $group3 = $_POST['Group3'];  $group3SubmissionDate = $_POST['Group3SubmissionDate'];
    $group4 = $_POST['Group4'];  $group4SubmissionDate = $_POST['Group4SubmissionDate'];
    $group5 = $_POST['Group5'];  $group5SubmissionDate = $_POST['Group5SubmissionDate'];
    $group6 = $_POST['Group6'];  $group6SubmissionDate = $_POST['Group6SubmissionDate'];
    $group7 = $_POST['Group7'];  $group7SubmissionDate = $_POST['Group7SubmissionDate'];
    $group8 = $_POST['Group8'];  $group8SubmissionDate = $_POST['Group8SubmissionDate'];
    $group9 = $_POST['Group9'];  $group9SubmissionDate = $_POST['Group9SubmissionDate'];
    $group10 = $_POST['Group10'];  $group10SubmissionDate = $_POST['Group10SubmissionDate'];
    $group11 = $_POST['Group11'];  $group11SubmissionDate = $_POST['Group11SubmissionDate'];
    $group12 = $_POST['Group12'];  $group12SubmissionDate = $_POST['Group12SubmissionDate'];
    $group13 = $_POST['Group13'];  $group13SubmissionDate = $_POST['Group13SubmissionDate'];
    $group14 = $_POST['Group14'];  $group14SubmissionDate = $_POST['Group14SubmissionDate'];
    $group15 = $_POST['Group15'];  $group15SubmissionDate = $_POST['Group15SubmissionDate'];
    $group16 = $_POST['Group16'];  $group16SubmissionDate = $_POST['Group16SubmissionDate'];
    $group17 = $_POST['Group17'];  $group17SubmissionDate = $_POST['Group17SubmissionDate'];
    $group18 = $_POST['Group18'];  $group18SubmissionDate = $_POST['Group18SubmissionDate'];
    $group19 = $_POST['Group19'];  $group19SubmissionDate = $_POST['Group19SubmissionDate'];
    $group20 = $_POST['Group20'];  $group20SubmissionDate = $_POST['Group20SubmissionDate'];
    $group21 = $_POST['Group21'];  $group21SubmissionDate = $_POST['Group21SubmissionDate'];
    $group22 = $_POST['Group22'];  $group22SubmissionDate = $_POST['Group22SubmissionDate'];
    $group23 = $_POST['Group23'];  $group23SubmissionDate = $_POST['Group23SubmissionDate'];
    $group24 = $_POST['Group24'];  $group24SubmissionDate = $_POST['Group24SubmissionDate'];
    $group25 = $_POST['Group25'];  $group25SubmissionDate = $_POST['Group25SubmissionDate'];
    $group26 = $_POST['Group26'];  $group26SubmissionDate = $_POST['Group26SubmissionDate'];
    $group27 = $_POST['Group27'];  $group27SubmissionDate = $_POST['Group27SubmissionDate'];
    $group28 = $_POST['Group28'];  $group28SubmissionDate = $_POST['Group28SubmissionDate'];
    $group29 = $_POST['Group29'];  $group29SubmissionDate = $_POST['Group29SubmissionDate'];
    $group30 = $_POST['Group30'];  $group30SubmissionDate = $_POST['Group30SubmissionDate'];
    $group31 = $_POST['Group31'];  $group31SubmissionDate = $_POST['Group31SubmissionDate'];
    $group32 = $_POST['Group32'];  $group32SubmissionDate = $_POST['Group32SubmissionDate'];
    $group33 = $_POST['Group33'];  $group33SubmissionDate = $_POST['Group33SubmissionDate'];
    $group34 = $_POST['Group34'];  $group34SubmissionDate = $_POST['Group34SubmissionDate'];

    $queryAssigningTutors = "SELECT * FROM Tutor WHERE TutorFirstName = '$TutorFirstName' AND TutorLastName = '$TutorLastName'"; 
    $resultAssigningTutors = $mysqli->query($queryAssigningTutors); 
    $getTutorID = $resultAssigningTutors -> fetch_object();
    $TutorID = $getTutorID -> TutorID;
    $check = $resultAssigningTutors -> num_rows;

        $queryAssignTutor = "UPDATE learner SET TutorID = $TutorID WHERE UniqueLearnerNumber = '$learnerID'";
        $resultAssignTutor = $mysqli->query($queryAssignTutor);
        echo"successful";

        $msg = "Tutor assigned";
        header("location: ../../users/admin/templateChoice.php");
?>