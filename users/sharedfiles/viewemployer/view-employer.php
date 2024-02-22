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

$EmployerID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'"; 
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner -> fetch_object();

$sql = "SELECT EmployerFirstName, EmployerLastName, EmployerEmail FROM employer WHERE UniqueEmployerNumber = ? ";

$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $learnerID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $EmployerFirstName, $EmployerLastName, $EmployerEmail);
if (mysqli_stmt_fetch($stmt)) {
    
} else {
    echo "0 results";
}

mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$obj->LearnerFirstName} {$obj->LearnerLastName}</h3>";
        echo"<p>Learner</p>";
        ?>
      </div>
      <ul>
        <li><a href="learner.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">View Progress</span>
          </a>
        </li>
        <li><a href="#">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="#">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Employment Status</span>
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
            <span class="icon"><i class="fas fa-cog"></i></span>
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
              
               <table>
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
                           <td>Employer 10</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>:</td>
                           <td><?php echo $LearnerEmail; ?></td>
                       </tr>
                       <tr>
                           <td>Cohort</td>
                           <td>:</td>
                           <td><?php echo  $Cohort; ?></td>
                       </tr>
                       <tr>
                           <td>Apprenticeship</td>
                           <td>:</td>
                           <td><?php echo $AppreticeshipName; ?></td>
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