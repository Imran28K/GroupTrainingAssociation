<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$employerID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'employer'){

$querySessions = "SELECT * FROM learner WHERE EmployerID = $employerID"; 
$resultSessions = $mysqli->query($querySessions); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view learners tutor</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
$userID = $_SESSION['userID'];

$queryEmployer = "SELECT * FROM Employer WHERE EmployerID = '$employerID'"; 
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
        <li><a href="employer.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="viewLearnersEmployer.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View employees</span>
          </a>
        </li>
        <li><a href="chooseReport.php" class="active">
            <span class="icon"><i class="fas fa-edit"></i></span>
            <span class="item">Employer report</span>
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
        <h1>Which employee would you like to write a report for?</h1>
        <table>
        <tr>
            <td>Employee name</td>
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
                <form action='employerRAG.php' name='uniqueLearnerNumber' method='post'>
                <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value={$obj -> UniqueLearnerNumber}>
                <input type='submit' value='Write report'>
            </form>
            </td>
        </tr>";
        }        ?>
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