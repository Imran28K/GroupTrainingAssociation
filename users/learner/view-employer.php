<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Learner Info</title>

  <link rel="stylesheet" href="../../css/learnerinfo.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$learnerID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'learner'){

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'";
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner->fetch_object();

$sql = "SELECT LearnerFirstName, LearnerLastName, LearnerEmail, Cohort, ApprenticeshipName, EmployerID FROM learner WHERE UniqueLearnerNumber = ? ";

$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $learnerID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $LearnerFirstName, $LearnerLastName, $LearnerEmail, $Cohort, $ApprenticeshipName, $EmployerID);
if (!mysqli_stmt_fetch($stmt)) {
  echo "0 results";
}

mysqli_stmt_close($stmt);

$employerID = $EmployerID;

$sqlEmployer = "SELECT EmploymentName, EmployerFirstName, EmployerLastName , EmployerEmail FROM employer WHERE EmployerID = ?";
$stmtEmployer = mysqli_prepare($mysqli, $sqlEmployer);

if ($stmtEmployer) {

  mysqli_stmt_bind_param($stmtEmployer, "i", $employerID);
  mysqli_stmt_execute($stmtEmployer);
  mysqli_stmt_bind_result($stmtEmployer, $EmploymentName, $EmployerFirstName, $EmployerLastName, $EmployerEmail);

  if (!mysqli_stmt_fetch($stmtEmployer)) {
    echo "No employer found with the specified ID";
  }
  mysqli_stmt_close($stmtEmployer);
} else {
  echo "Failed to prepare the SQL statement";
}

mysqli_close($mysqli);
?>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="../../images/logos/gtalogo.png" alt="profile_picture">
        <?php
        echo "<h3>{$obj->LearnerFirstName} {$obj->LearnerLastName}</h3>";
        echo "<p>Learner</p>";
        ?>
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
        <li><a href="viewOTJLearner.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View OTJ Hours</span>
          </a>
        </li>
        <li><a href="view-employer.php" class="active">
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
            <span class="icon"><i class="fas fa-user-friends"></i></span>
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
        <div class="main">

          <div class="card">
            <div class="card-body">

              <table class="info-table">
                <tbody>
                  <tr>
                    <td>Place of Employment</td>
                    <td>:</td>
                    <td><?php echo $EmploymentName; ?></td>
                  </tr>
                  <tr>
                    <td>Employer name</td>
                    <td>:</td>
                    <td><?php echo $EmployerFirstName . " " . $EmployerLastName; ?></td>
                  </tr>
                  <tr>
                    <td>Employer's Email</td>
                    <td>:</td>
                    <td><?php echo $EmployerEmail; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


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