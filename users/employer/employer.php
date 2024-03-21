<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Employer Home</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];

$queryDetails = "SELECT * FROM employer WHERE EmployerID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();
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
        <li><a href="employer.php" class="active">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="viewLearnersEmployer.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View employees</span>
          </a>
        <li><a href="chooseReport.php">
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
      <div class="container">
        <h2>Your details</h2>
        <ul>
          <li>Your name is: <?php echo"{$details->EmployerFirstName} {$details->EmployerLastName}"; ?></li>
          <li>Your email is: <?php echo"{$details->EmployerEmail}"; ?></li>
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