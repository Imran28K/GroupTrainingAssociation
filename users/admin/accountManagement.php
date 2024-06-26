<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Attendance Landing Page</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .container p {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
      }

      .nav-pills li {
        list-style: none;
        margin-bottom: 10px;
      }

      .nav-pills a {
        display: block;
        padding: 10px;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s;
      }

      .nav-pills a:hover {
        background-color: #0056b3;
      }
    </style>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  </head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultLearner = $mysqli->query($queryLearner);

$details = $resultLearner -> fetch_object();
?>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="../../images/logos/gtalogo.png" alt="profile_picture">
            <?php 
            echo"<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
            echo"<p>{$details->Role}</p>";
            ?>
        </div>
      <ul>
        <li><a href="admin.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLandingAdmin.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="adminConsole.php" class="active">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Admin Page</span>
          </a>
        </li>
        <li><a href="manageSubmissionAdmin.php">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="item">Submissions</span>
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
            <p>Choose which type of account to edit</p>
            <ul class="nav-pills">
                <li> <a href="learnerAccounts.php">Learner Accounts</a> </li>
                <li> <a href="tutorAccounts.php">Tutor Accounts</a> </li>
                <li> <a href="employerAccounts.php">Employer Accounts</a> </li>
                <li> <a href="admin-account.php">Admin Accounts</a> </li>
            </ul>

            <ul class="nav-pills">
                <li> <a href="adminConsole.php">Back</a> </li>
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
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
