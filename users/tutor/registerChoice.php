<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
$_SESSION['sessionID'] = "";
$sessionID = $_SESSION['sessionID'];
$role = $_SESSION['userRole'];
if ($role == 'tutor'){
require_once ("../../db/dbconnection.php");
$queryRegisterList = "SELECT * FROM registersessions";
$resultRegisterList = $mysqli->query($queryRegisterList); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/navfoot.css">
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
        <li><a href="manageSubmissions.php">
            <span class="icon"><i class="fas fa-upload"></i></span>
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
                    <input type='submit' value='Select'>
                    </form>
                    </td></tr>";
        }?>
        </table>
    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='attendanceLanding.php'> Back to attendance </a> </li>
    </ul>
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