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
    <title>view learners tutor</title>
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
        <li><a href="attendanceLanding.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersTutor.php" class="active">
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
        <h1>View Learners</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Apprenticeship</td>
        </tr>
        <?php while ($obj = $resultSessions -> fetch_object()){
        $learnerID = $obj -> UniqueLearnerNumber;
        echo"<tr>
            <td>{$obj -> LearnerFirstName} {$obj -> LearnerLastName}</td>
            <td>
                {$obj -> ApprenticeshipName}
            </td>
            <td>
                <form action='viewLearnerDetails.php' name='uniqueLearnerNumber' method='post'>
                <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value={$obj -> UniqueLearnerNumber}>
                <input type='submit' value='View learner'>
            </form>
            </td>
        </tr>";
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='tutor.php'> Back to tutor page </a> </li>
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