<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$EmployerID = $_SESSION['userID'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Employer to a Learner</title>
    <link rel="stylesheet" href="../css/navfoot.css">
</head>

<?php 
$EmployerID = $_SESSION['userID'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Employer to a learner</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryEmployer = "SELECT * FROM employer WHERE EmployerID = '$userID'"; 
$resultEmployer = $mysqli->query($queryEmployer);

$details = $resultEmployer -> fetch_object();
?>

  <body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="../../images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$details->EmployerFirstName} {$details->EmployerLastName}</h3>";
        echo"<p>{$details->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="admin.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLandingAdmin.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="adminConsole.php" class="active">
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
        <h1>Assign an Employer</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Employer</td>
        </tr>
        <?php
        $queryGetLearners = "SELECT * FROM learner"; 
        $resultGetLearners = $mysqli->query($queryGetLearners); 

        while ($objLearner = $resultGetLearners -> fetch_object()){
          $learnerID = $objLearner -> UniqueLearnerNumber;
          $learnerIDString = sprintf($learnerID);

          $EmployerID = $objLearner -> EmployerID;

          $queryGetEmployer = "SELECT * FROM employer WHERE EmployerID = '$EmployerID'"; 
          $resultGetEmployer = $mysqli->query($queryGetEmployer); 
          $objEmployer = $resultGetEmployer -> fetch_object();

          $querySessions = "SELECT * FROM learner WHERE EmployerID = $EmployerID"; 
          $resultSessions = $mysqli->query($querySessions); 
          
          $row_count = $resultSessions -> num_rows;

          if($row_count > 0) {
            echo"<tr>
                <td>{$objLearner -> LearnerFirstName} {$objLearner -> LearnerLastName}</td>
                <form action='../../credentials/query/assign-emp-query.php' method='post'>
                <td>
                  <input type='text' name='EmployerName' value='{$objEmployer->EmployerFirstName} {$objEmployer->EmployerLastName}' required />
                  <input type='hidden' name='learnerID' value='$learnerIDString' /> 
                </td>
                <td>
                <button type='submit'>Assign Employer</button>
                </td>
                </form>
              </tr>";
          }
          else if ($row_count <= 0) {
            echo"<tr>
                <td>{$objLearner -> LearnerFirstName} {$objLearner -> LearnerLastName}</td>
                <form action='../../credentials/query/assign-emp-query.php' method='post'>
                <td>
                  <input type='text' name='EmployerName' value='No Employer' required />
                  <input type='hidden' name='learnerID' value='$learnerIDString' /> 
                </td>
                <td>
                <button type='submit'>Assign Employer</button>
                </td>
                </form>
              </tr>";
          }
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='adminConsole.php'> Back </a> </li>
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