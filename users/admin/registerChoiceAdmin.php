<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
$_SESSION['sessionID'] = "";
$sessionID = $_SESSION['sessionID'];
require_once ("../../db/dbconnection.php");
$queryRegisterList = "SELECT * FROM registersessions";
$resultRegisterList = $mysqli->query($queryRegisterList); 

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){
$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultLearner = $mysqli->query($queryLearner);
$details = $resultLearner->fetch_object();
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
            <li><a href="attendanceLandingAdmin.php" class="active">
                    <span class="icon"><i class="fas fa-desktop"></i></span>
                    <span class="item">View Attendance</span>
                </a>
            </li>
            <li><a href="viewLearnersAdmin.php">
                    <span class="icon"><i class="fas fa-user-friends"></i></span>
                    <span class="item">View learners</span>
                </a>
            </li>
            <li><a href="adminConsole.php">
                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                    <span class="item">Admin Page</span>
                </a>
            </li>
            <li><a href="manageSubmissionAdmin.php">
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
            <h1>Attendance</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Apprenticeship</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($obj = $resultRegisterList->fetch_object()): ?>
                        <tr>
                            <td><?php echo $obj->SessionDate; ?></td>
                            <td><?php echo $obj->TimeStart; ?></td>
                            <td><?php echo $obj->TimeEnd; ?></td>
                            <td><?php echo $obj->apprenticeshipName; ?></td>
                            <td>
                                <form action='registerAttendanceAdmin.php' name='sessionID' method='post'>
                                    <input type='hidden' id='sessionID' name='sessionID' value="<?php echo $obj->SessionID; ?>">
                                    <input type='submit' value='Select'>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <ul class="nav nav-pills nav-stacked" role="tablist">
                <li><a href='attendanceLandingAdmin.php'>Back to attendance</a></li>
            </ul>
        </div>

        <script type="text/javascript">
            var hamburger = document.querySelector(".hamburger");
            hamburger.addEventListener("click", function() {
                document.querySelector("body").classList.toggle("active");
            })
        </script>
    </div>
</div>

</body>
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
