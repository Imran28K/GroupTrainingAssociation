<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];

$querySessions = "SELECT * FROM learner WHERE TutorID = $tutorID"; 
$resultSessions = $mysqli->query($querySessions); 

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View learners tutor</title>
    <link rel="stylesheet" href="../css/navfoot.css">
</head>

<?php 
$tutorID = $_SESSION['userID'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view learners tutor</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
$userID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
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
        <li><a href="tutor.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLandingTutor.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersTutor.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="updateLearnersTutor.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Update learners</span>
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
        <h1>View Learners</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Apprenticeship</td>
            <td>Training Center Hours</td>
            <td>Employer Training Records</td>
            <td>GTA Specialist Training</td>
            <td>VLE Hours</td>
            <td>Cumulative Hours</td>
        </tr>
        <?php while ($obj = $resultSessions -> fetch_object()){
          $learnerID = $obj -> UniqueLearnerNumber;
          $learnerIDString = sprintf($learnerID);

          $queryOTJ = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$learnerIDString'"; 
          $resultOTJ = $mysqli->query($queryOTJ);

          while($OTJobj = $resultOTJ -> fetch_object()) {

          echo"<tr>
            <td>{$obj -> LearnerFirstName} {$obj -> LearnerLastName}</td>
            <td>
                {$obj -> ApprenticeshipName}
            </td>
            <td>
            <form action='../OTJ/updateOffTheJobHours.php' method='post'>
            <td>
              <input type='text' name='TrainingCenterHours' value='{$OTJobj->TrainingCenterHours}' required />
            </td>
            <td>
              <input type='text' name='EmployerTrainingRecords' value='{$OTJobj->EmployerTrainingRecords}' required />
            </td>
            <td>
              <input type='text' name='GTASpecialistTraining' value='{$OTJobj->GTASpecialistTraining}' required />
            </td>
            <td>
              <input type='text' name='VLETraining' value='{$OTJobj->VLETraining}' required />
              <input type='hidden' name='learnerID' value='$learnerIDString' /> 
            </td>
            <td>
            <button type='submit'>Update Hours</button>
            </td>
            </form>
          </tr>";
          }
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='adminConsole.php'> Back </a> </li>
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