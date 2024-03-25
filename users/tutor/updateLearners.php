<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'tutor'){

$querySessions = "SELECT * FROM learner WHERE TutorID = $tutorID"; 
$resultSessions = $mysqli->query($querySessions); 

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update learners</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php

$obj = $resultLearner -> fetch_object();
?>

  <body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="../../images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$obj->TutorFirstName} {$obj->TutorLastName}</h3>";
        echo"<p>{$obj->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="../../users/tutor/tutor.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLanding.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersTutor.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="updateLearners.php" class="active">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Update learners</span>
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
        <h1>Update Learners</h1>
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
                <form action='updateLearnerDetails.php' name='uniqueLearnerNumber' method='post'>
                <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value={$obj -> UniqueLearnerNumber}>
                <input type='submit' value='Update this learner's progress'>
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
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>