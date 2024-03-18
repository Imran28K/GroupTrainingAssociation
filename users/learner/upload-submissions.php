<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Submissions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" type="text/css" href="../../css/tabledesign.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$userID'";
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner->fetch_object();

$sql = "SELECT ProgressID FROM learner WHERE UniqueLearnerNumber = ? ";

$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $userID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $ProgressID);
if (!mysqli_stmt_fetch($stmt)) {
  echo "0 results";
}

mysqli_stmt_close($stmt);

$progressID = $ProgressID;

$sqlLearningprogress = "SELECT UnitID FROM learningprogress WHERE ProgressID = ?";
$stmtLearningprogress = mysqli_prepare($mysqli, $sqlLearningprogress);

if ($stmtLearningprogress) {

  mysqli_stmt_bind_param($stmtLearningprogress, "i", $ProgressID);
  mysqli_stmt_execute($stmtLearningprogress);
  mysqli_stmt_bind_result($stmtLearningprogress, $ProgressID);

  if (!mysqli_stmt_fetch($stmtLearningprogress)) {
    echo "No progress found with the specified ID";
  }
  mysqli_stmt_close($stmtLearningprogress);
} else {
  echo "Failed to prepare the SQL statement";
}

mysqli_close($mysqli);


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
                <li><a href="upload-submissions.php" class="active">
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
                
                <h2>Submission Progress</h2>

                <table style="width:100%">
                    <tr>
                        <th>Units</th>
                        <th>Due</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td><?php echo $ProgressID ?></td>
                        <td>20/05/2026</td>
                        <td>submitted</td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>30/05/2026</td>
                        <td>unsubmitted</td>
                    </tr>
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

