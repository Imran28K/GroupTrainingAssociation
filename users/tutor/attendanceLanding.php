<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>attendance landing page</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  </head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'tutor'){

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
        <li><a href="tutor.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLanding.php" class="active">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersTutor.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="viewOTJTutor.php"> 
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Off The Job Hours</span>
          </a>
        </li>
        <li><a href="manageSubmissions.php">
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
      <p>Choose whether you want to go to the register or to create a new session</p>
      <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='registerChoice.php'> Register Attendance </a> </li>
        <li> <a href='createSession.php'> Create a new session </a> </li>
      </ul>

      <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='tutor.php'> To profile details </a> </li>
      </ul>
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