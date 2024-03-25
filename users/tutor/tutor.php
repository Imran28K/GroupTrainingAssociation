<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tutor Home</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'tutor'){

$queryDetails = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();
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
        <li><a href="tutor.php" class="active">
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
        <h2>Your details</h2>
        <ul>
          <li>Your name is: <?php echo"{$details->TutorFirstName} {$details->TutorLastName}"; ?></li>
          <li> 
            <form action="updateTutorInfo.php" method="post">
              <label> Your email is: </label>
              <input type="email" name="email" value="<?php echo"{$details->TutorEmail}"; ?>" required />
              <input type="hidden" name="tutorID" value="<?php echo "{$details->TutorID}"; ?>" />
              <button type="submit">Change email</button>
            </form>
          </li>
          <li>Your tutor code is: <?php echo"{$details->TutorCode}"; ?></li>
          <li>Your role is: <?php echo"{$details->Role}"; ?></li>
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