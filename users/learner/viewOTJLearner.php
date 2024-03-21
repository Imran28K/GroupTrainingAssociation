<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];

$querySessions = "SELECT * FROM learner"; 
$resultSessions = $mysqli->query($querySessions); 

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

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$userID'";
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner->fetch_object();
?>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
        <?php
        echo "<h3>{$obj->LearnerFirstName} {$obj->LearnerLastName}</h3>";
        ?>
        <p>Learner</p>
      </div>
      <ul>
        <li><a href="learner.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">View Progress</span>
          </a>
        </li>
        <li><a href="viewAttendance.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewOTJLearner.php" class="active">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View OTJ Hours</span>
          </a>
        </li>
        <li><a href="view-employer.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View Employer</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/users/learner/view-apprent.php">
            <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
            <span class="item">Module Information</span>
          </a>
        </li>
        <li><a href="learnerinfo.php">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">User Information</span>
          </a>
        </li>
        <li><a href="upload-submissions.php">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Submissions</span>
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
        <h1>Learner Off the job hours</h1>

        
        <?php 
            $queryOTJ = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$userID'"; 
            $resultOTJ = $mysqli->query($queryOTJ);
            $row_count = $resultOTJ -> num_rows;
            $OTJobj = $resultOTJ -> fetch_object();
            $tutorID = $OTJobj -> SignedOffBy;

            $querySigned = "SELECT * FROM tutor WHERE TutorID = '$tutorID'"; 
            $resultSigned = $mysqli->query($querySigned);
            $signedObj = $resultSigned -> fetch_object();

            if ($row_count > 0){
              echo"<table>
              <tr>
                  <td>Your Apprenticeship</td>
                  <td>Expected Hours</td>
                  <td>Training Center Hours</td>
                  <td>Employer Training Records</td>
                  <td>GTA Specialist Training</td>
                  <td>VLE Hours</td>
                  <td>Cumulative Hours</td>
                  <td>Signed off by</td>
              </tr>
              <tr>
                <td>{$obj -> ApprenticeshipName}</td>
                <td>{$OTJobj->ExpectedHours}</td>
                <td>{$OTJobj->TrainingCenterHours}</td>
                <td>{$OTJobj->EmployerTrainingRecords}</td>
                <td>{$OTJobj->GTASpecialistTraining}</td>
                <td>{$OTJobj->VLETraining}</td>
                <td>{$OTJobj->CumulativeHours}</td>
                <td>{$signedObj->TutorFirstName} {$signedObj->TutorLastName}</td>
              </tr>";
            }
            else if ($row_count <= 0) {
              echo"It looks like your hours haven't been entered yet";
            }
          ?>
        </table>
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