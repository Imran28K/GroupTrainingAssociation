<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
$_SESSION['sessionID'] = "";
$sessionID = $_SESSION['sessionID'];
require_once ("../db/dbconnection.php");
$queryRegisterList = "SELECT * FROM registersessions";
$resultRegisterList = $mysqli->query($queryRegisterList); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
$learnerID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$learnerID'"; 
$resultLearner = $mysqli->query($queryLearner);

$details = $resultLearner -> fetch_object();
?>

  <body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
        echo"<p>{$details->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="http://localhost/GroupTrainingAssociation/users/tutor/tutor.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/users/tutor/attendanceLanding.php" class="active">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/users/tutor/viewLearnersTutor.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/users/tutor/updateLearners.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Update learners</span>
          </a>
        </li>
        <li><a href="#">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Settings</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/credentials/login.php">
            <span class="icon"><i class="fas fa-cog"></i></span>
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

    <div class="attendance-container">
        <h1>Attendance</h1>
        <table>
        <tr>
            <td>Date</td>
            <td>Time Start</td>
            <td>Time End</td>
            <td>Apprenticeship</td>
            <td>Select</td>
        </tr>
        <?php while ($obj = $resultRegisterList -> fetch_object()){
                    echo"
                    <tr>
                        <td>{$obj -> SessionDate}</td>
                        <td>{$obj -> TimeStart}</td>
                        <td>{$obj -> TimeEnd}</td>
                        <td>{$obj -> apprenticeshipName}</td>
                        <td>
                    <form action='registerAttendance.php' name='sessionID' method='post'>
                    <input type='hidden' id='sessionID' name='sessionID' value={$obj -> SessionID}>
                    <input type='submit' value='Select Date'>
                    </form>
                    </td></tr>";
        }?>
        </table>
    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='../users/tutor/attendanceLanding.php'> Back attendance </a> </li>
    </ul>
    </div>

  <script type="text/javascript">
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
      document.querySelector("body").classList.toggle("active");
    })
  </script>

</body>

</html>