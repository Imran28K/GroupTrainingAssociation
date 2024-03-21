<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $RAG = $_POST['RAG'];
    $details = $_POST['details'];
    $learnerID = $_POST['uniqueLearnerNumber'];
    $password = $_POST['password'];
    $userID = $_SESSION['userID'];

    $queryEmployerDetails= "SELECT * FROM employer WHERE EmployerID = '$userID' AND EmployerPassword = '$password'";
    $resultEmployerDetails = $mysqli->query($queryEmployerDetails);
    $passwordCheck = $resultEmployerDetails -> num_rows;
    echo"The ID is: $learnerID";

    $queryAlreadyReviewed = "SELECT * FROM employmentprogress WHERE UniqueLearnerNumber = '$learnerID'";
    $resultAlreadyReviewed = $mysqli->query($queryAlreadyReviewed);
    $existingReviewCheck = $resultAlreadyReviewed -> num_rows;
    echo"The number of rows is: $existingReviewCheck";

    $queryLearnerDetails= "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'";
    $resultLearnerDetails = $mysqli->query($queryLearnerDetails);
    $learnerDetails = $resultLearnerDetails -> fetch_object();

    if ($existingReviewCheck > 0 && $passwordCheck == 1){
        $queryUpdateReview = "UPDATE employmentprogress SET EmploymentRAG = '$RAG', ReportContent = '$details' WHERE UniqueLearnerNumber = '$learnerID'";
        $resultUpdateReview = $mysqli->query($queryUpdateReview);
        header('location:../../users/employer/chooseReport.php');
    }
    else if ($existingReviewCheck <= 0 && $passwordCheck == 1){
        $learnerIDCheckNow = $learnerDetails -> UniqueLearnerNumber;
        $learnerFirstName = $learnerDetails -> LearnerFirstName;
        $learnerLastName = $learnerDetails -> LearnerLastName;
        $queryCreateReview = "INSERT INTO employmentprogress (EmployerID, UniqueLearnerNumber, LearnerFirstName, LearnerLastName, EmploymentRAG, ReportContent) VALUES ('$userID', '$learnerID', '$learnerFirstName', '$learnerLastName', '$RAG', '$details')";
        $resultCreateReview = $mysqli->query($queryCreateReview);
        header('location:../../users/employer/chooseReport.php');
    }
    else if ($passwordCheck < 1){
        echo"Your password was incorrect";
    }
}
?>