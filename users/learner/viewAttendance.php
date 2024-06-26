<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Side Navigation Bar</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
if ($role == 'learner'){

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$userID'"; 
$resultLearner = $mysqli->query($queryLearner);
$obj = $resultLearner->fetch_object();

$queryAttendance = "SELECT * FROM attendance WHERE UniqueLearnerNumber = '$userID'"; 
$resultAttendance = $mysqli->query($queryAttendance);
?>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="../../images/logos/gtalogo.png" alt="profile_picture">
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
            <li><a href="viewAttendance.php" class="active">
                    <span class="icon"><i class="fas fa-desktop"></i></span>
                    <span class="item">View Attendance</span>
                </a>
            </li>
            <li><a href="viewOTJLearner.php">
                    <span class="icon"><i class="fas fa-desktop"></i></span>
                    <span class="item">View OTJ Hours</span>
                </a>
            </li>
            <li><a href="view-employer.php">
                    <span class="icon"><i class="fas fa-user-friends"></i></span>
                    <span class="item">View Employer</span>
                </a>
            </li>
            <li><a href="../../users/learner/view-apprent.php">
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
            <h2>Your attendance</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Session date</th>
                        <th>Session start time</th>
                        <th>Session end time</th>
                        <th>Present</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($attendanceDetails = $resultAttendance->fetch_object()){
                        $sessionID = $attendanceDetails->SessionID;
                        $querySession = "SELECT * FROM registersessions WHERE SessionID = $sessionID"; 
                        $resultSession = $mysqli->query($querySession);
                        $sessionDetails = $resultSession->fetch_object();
                        echo "<tr>
                                <td>{$sessionDetails->SessionDate}</td>
                                <td>{$sessionDetails->TimeStart}</td>
                                <td>{$sessionDetails->TimeEnd}</td>
                                <td>{$attendanceDetails->Present}</td>
                              </tr>";       
                    }?>
                </tbody>
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
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
