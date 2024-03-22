<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];

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

$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();
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
        <li><a href="manageSubmissionsAdmin.php">
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
        <h1>Assign a Tutor</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Tutor</td>
        </tr>
        <?php
        $queryGetLearners = "SELECT * FROM learner"; 
        $resultGetLearners = $mysqli->query($queryGetLearners); 

        while ($objLearner = $resultGetLearners -> fetch_object()){
          $learnerID = $objLearner -> UniqueLearnerNumber;
          $learnerIDString = sprintf($learnerID);

          $TutorID = $objLearner -> TutorID;

          $queryGetTutor = "SELECT * FROM tutor WHERE TutorID = '$TutorID'"; 
          $resultGetTutor = $mysqli->query($queryGetTutor); 
          $objTutor = $resultGetTutor -> fetch_object();

          $querySessions = "SELECT * FROM learner WHERE TutorID = $tutorID"; 
          $resultSessions = $mysqli->query($querySessions); 
          
          $row_count = $resultSessions -> num_rows;

          if($row_count > 0) {
            echo"<tr>
                <td>{$objLearner -> LearnerFirstName} {$objLearner -> LearnerLastName}</td>
                <form action='../../credentials/query/assigningTutorsQuery.php' method='post'>
                <td>
                  <input type='text' name='TutorName' value='{$objTutor->TutorFirstName} {$objTutor->TutorLastName}' required />
                  <input type='hidden' name='learnerID' value='$learnerIDString' /> 
                </td>
                <td>
                <button type='submit'>Assign Tutor</button>
                </td>
                </form>
              </tr>";
          }
          else if ($row_count <= 0) {
            echo"<tr>
                <td>{$objLearner -> LearnerFirstName} {$objLearner -> LearnerLastName}</td>
                <form action='../../credentials/query/assigningTutorsQuery.php' method='post'>
                <td>
                  <input type='text' name='TutorName' value='No Tutor' required />
                  <input type='hidden' name='learnerID' value='$learnerIDString' /> 
                </td>
                <td>
                <button type='submit'>Assign Tutor</button>
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