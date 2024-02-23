<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>view learner details</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$employerID = $_SESSION['userID'];

$queryDetails = "SELECT * FROM employer WHERE EmployerID = '$employerID'"; 
$resultDetails= $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();

$learnerID = $_POST['uniqueLearnerNumber'];
$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'"; 
$resultLearner= $mysqli->query($queryLearner);

$learnerDetails = $resultLearner -> fetch_object();
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
        <li><a href="http://localhost/GroupTrainingAssociation/users/employer/employer.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="viewLearnersEmployer.php"  class="active">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="#">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="item">Settings</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/credentials/login.php">
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

      <div class="container">
        <?php echo"<h2>{$learnerDetails -> LearnerFirstName} {$learnerDetails -> LearnerLastName}'s progress</h2>"?>
        <h3 class="chart-heading">Learner Progress</h3>
        <div class="programming-stats">
          <div class="chart-container">
            <canvas class="my-chart"></canvas>
          </div>

          <div class="details">
            <ul></ul>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../sharedfiles/learnerprogress/piechart.js"></script>
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