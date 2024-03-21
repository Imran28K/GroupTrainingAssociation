<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$learnerID = $_POST['uniqueLearnerNumber'];
$learnerIDString = strval($learnerID);

$queryDetails = "SELECT * FROM employer WHERE EmployerID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);
$details = $resultDetails -> fetch_object();

$queryLearnerDetails = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerIDString'"; 
$resultLearnerDetails= $mysqli->query($queryLearnerDetails);
$learnerDetails = $resultLearnerDetails -> fetch_object();

$queryAlreadyReviewed = "SELECT * FROM employmentprogress WHERE UniqueLearnerNumber = '$learnerIDString'";
$resultAlreadyReviewed = $mysqli->query($queryAlreadyReviewed);
$existingReviewCheck = $resultAlreadyReviewed -> num_rows;
?>

  <body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$details->EmployerFirstName} {$details->EmployerLastName}</h3>";
        echo"<p>{$details->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="employer.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="viewLearnersEmployer.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View employees</span>
          </a>
        <li><a href="chooseReport.php" class="active">
            <span class="icon"><i class="fas fa-edit"></i></span>
            <span class="item">Employer report</span>
          </a>
        </li>
        <li><a href="../../credentials/login.php">
            <span class="icon"><i class="fas fa-door-open"></i></span>
            <span class="item">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="section">
      <div class="top_navbar">
        <div class="hamburger">
          <a href="#"><i class="fas fa-bars"></i></a>
        </div>
      </div>
  <?php

    if ($existingReviewCheck > 0){
      $existingReviewDetails = $resultAlreadyReviewed -> fetch_object();
      echo"<div class='container'>
        <h1>Write report for {$learnerDetails->LearnerFirstName} {$learnerDetails->LearnerLastName}</h1>
        <form action='../../credentials/query/report.php' method='post' class='login-form'>
              <label for='RAG'>How well did the employee work? </label></br>
              <select id='RAG' name='RAG' required>
                <option value='None'> None selected</option>
                <option value='Red'> Red - Poor</option>
                <option value='Amber'> Amber - Fine </option>
                <option value='Green'> Green - Good </option>
              </select> </br>
              <label for='details'>Write any details </label></br>
              <textarea id='details' name='details' required>{$existingReviewDetails->ReportContent}</textarea></br>
              <label for='password'>Input your password </label></br>
              <input type='password' id='password' name='password' required></br>
              <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value='$learnerIDString'>
              <button type='submit' name='submit' class='attendance-submit'>Complete Report</button>
        </form>";
    }
    else if($existingReviewCheck <= 0){
      echo"<div class='container'>
        <h1>Write report for {$learnerDetails->LearnerFirstName} {$learnerDetails->LearnerLastName}</h1>
        <form action='../../credentials/query/report.php' method='post' class='login-form'>
              <label for='RAG'>How well did the employee work? </label></br>
              <select id='RAG' name='RAG' required>
                <option value='None'> None selected</option>
                <option value='Red'> Red - Poor</option>
                <option value='Amber'> Amber - Fine </option>
                <option value='Green'> Green - Good </option>
              </select> </br>
              <label for='details'>Write any details </label></br>
              <textarea id='details' name='details' required></textarea></br>
              <label for='password'>Input your password </label></br>
              <input type='password' id='password' name='password' required></br>
              <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value='$learnerIDString'>
              <button type='submit' name='submit' class='attendance-submit'>Complete Report</button>
        </form>";
    }
      

  ?>
    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='chooseReport.php'> Back </a> </li>
    </ul>
    </div>
  </div>
</div>
  <script type="text/javascript">
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
      document.querySelector("body").classList.toggle("active");
    })
  </script>

</body>

</html>