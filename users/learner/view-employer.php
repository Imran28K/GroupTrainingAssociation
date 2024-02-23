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

$LearnerID = $_SESSION['UserID'];
$
$sql = "SELECT EmployerFirstName, EmployerLastName, EmployerEmail FROM employer WHERE EmployerID = ? ";
$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $EmployerID);
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
        echo"<h3>{$EmployerFirstName} {$EmployerLastName}</h3>";
        echo"<p>Employer</p>";
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
        <li><a href="http://localhost/GroupTrainingAssociation/users/learner/view-employer.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Your Employer</span>
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
                           <td>Employer Name</td>
                           <td>:</td>
                           <td><?php echo $EmployerFirstName . " " . $EmployerLastName; ?> </td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>:</td>
                           <td><?php echo $EmployerEmail; ?></td>
                       </tr>
                       <tr>
                           <td>Employer Details</td>
                           <td>:</td>
                           <td>GTA Doncaster</td>
                       </tr>
                       <tr>
                           <td>Phone#</td>
                           <td>:</td>
                           <td>07481088745</td>
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