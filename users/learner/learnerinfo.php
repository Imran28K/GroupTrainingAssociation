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

$sqlEmployer = "SELECT EmployerFirstName, EmployerLastName FROM employer WHERE EmployerID = ?";
$stmtEmployer = mysqli_prepare($mysqli, $sqlEmployer);

if ($stmtEmployer) {

  mysqli_stmt_bind_param($stmtEmployer, "i", $employerID);
  mysqli_stmt_execute($stmtEmployer);
  mysqli_stmt_bind_result($stmtEmployer, $EmployerFirstName, $EmployerLastName);

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
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
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
        <li><a href="#">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View Employer</span>
          </a>
        </li>
        <li><a href="#">
            <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
            <span class="item">Module Information</span>
          </a>
        </li>
        <li><a href="learnerinfo.php" class="active">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">User Information</span>
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
        <div class="main">

          <div class="card">
            <div class="card-body">

              <table class="info-table">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $LearnerFirstName . " " . $LearnerLastName; ?> </td>
                  </tr>
                  <tr>
                    <td>ULN</td>
                    <td>:</td>
                    <td><?php echo $learnerID; ?></td>
                  </tr>
                  <tr>
                    <td>Employer</td>
                    <td>:</td>
                    <td><?php echo $EmployerFirstName . " " . $EmployerLastName; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>
                      <form action="update-learnerinfo.php" method="post">
                        <input type="email" name="email" value="<?php echo $LearnerEmail; ?>" required />
                        <input type="hidden" name="learnerID" value="<?php echo $learnerID; ?>" />
                        <button type="submit">Change</button>
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td>Cohort</td>
                    <td>:</td>
                    <td><?php echo  $Cohort; ?></td>
                  </tr>
                  <tr>
                    <td>Apprenticeship</td>
                    <td>:</td>
                    <td><?php echo $ApprenticeshipName; ?></td>
                  </tr>
                  <tr>
                    <td>Start Date</td>
                    <td>:</td>
                    <td>01/07/2022</td>
                  </tr>
                  <tr>
                    <td>End Date</td>
                    <td>:</td>
                    <td>27/12/2023</td>
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

</html>