<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if ($_SESSION['sessionID'] == ""){
    $sessionID = $_POST['sessionID'];
    $_SESSION['sessionID'] = $sessionID;
}
else {
    $sessionID = $_SESSION['sessionID'];
}

require_once ("../../db/dbconnection.php");

$querySessions = "SELECT * FROM registersessions WHERE SessionID = $sessionID"; 
$resultSessions = $mysqli->query($querySessions); 

$getApprenticeship = $resultSessions -> fetch_object();
$apprenticeship = $getApprenticeship -> apprenticeshipName;
$apprenticeshipString = strval($apprenticeship);

$queryLearner = "SELECT * FROM learner WHERE ApprenticeshipName = '$apprenticeshipString'"; 
$resultLearner= $mysqli->query($queryLearner);

while ($getLearners = $resultLearner -> fetch_object()){
$learner = $getLearners -> UniqueLearnerNumber;

$queryAttendanceCheck = "SELECT UniqueLearnerNumber FROM attendance WHERE SessionID = $sessionID"; 
$resultAttendanceCheck = $mysqli->query($queryAttendanceCheck);

    $getLearnerCheck = $resultAttendanceCheck -> fetch_object();
    $learnerCheck = $getLearnerCheck -> UniqueLearnerNumber;

if ($learnerCheck != $learner){
$queryAddLearners = "INSERT INTO attendance (UniqueLearnerNumber, SessionID, Present) VALUES ('$learner', '$sessionID', 'No')"; 
$resultAddLearners= $mysqli->query($queryAddLearners);
}
}
$queryAttendance = "SELECT * FROM attendance WHERE SessionID = $sessionID"; 
$resultAttendance = $mysqli->query($queryAttendance); 

$userID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultLearner = $mysqli->query($queryLearner);

$details = $resultLearner -> fetch_object();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

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
            <td>Learner name</td>
            <td>Present?</td>
        </tr>
        <?php while ($obj = $resultAttendance -> fetch_object()){
        $learnerID = $obj -> UniqueLearnerNumber;

        $queryLearner = "SELECT * FROM learner LEFT JOIN attendance ON attendance.UniqueLearnerNumber = learner.UniqueLearnerNumber AND attendance.sessionID = '$sessionID' WHERE learner.UniqueLearnerNumber = '$learnerID'";    
        $resultLearner = $mysqli->query($queryLearner);
        $obj2 = $resultLearner -> fetch_object();
        if ($obj -> Present == "No"){
        echo"<tr>
            <td>{$obj2 -> LearnerFirstName} {$obj2 -> LearnerLastName}</td>
            <td>
                {$obj -> Present}
            </td>
            <td> 
                <form action='../../credentials/query/register.php' name='attendance' method='post'>
                    <input type='hidden' id='learnerID' name='learnerID' value=$learnerID>
                    <input type='hidden' id='SessionID' name='sessionID' value=$sessionID>
                    <input type='submit' value='Mark present'>
                </form>
            </td>
        </tr>";
        }
        else if ($obj -> Present == "Yes"){
            echo"<tr>
            <td>{$obj2 -> LearnerFirstName} {$obj2 -> LearnerLastName}</td>
            <td>
                {$obj -> Present}
            </td>
            <td> 
                <form action='../../credentials/query/unregister.php' name='attendance' method='post'>
                    <input type='hidden' id='learnerID' name='learnerID' value=$learnerID>
                    <input type='hidden' id='SessionID' name='sessionID' value=$sessionID>
                    <input type='submit' value='Mark not present'>
                </form>
            </td>
        </tr>"; 
        }
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='registerChoice.php'> Back to register choice </a> </li>
    </ul>
    </div>

          <div class="details">
            <ul></ul>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../../learnerprogress/main.js"></script>
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