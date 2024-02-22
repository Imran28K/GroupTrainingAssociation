<!DOCTYPE html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
    font-family: 'Open Sans', sans-serif;
  }

  body {
    background: #f5f6fa;
  }

  .wrapper .sidebar {
    background: #fff;
    position: fixed;
    top: 0;
    left: 0;
    width: 225px;
    height: 100%;
    padding: 30px 0;
    transition: all 0.5s ease;
  }

  .wrapper .sidebar .profile {
    margin-bottom: 30px;
    text-align: center;
  }

  .wrapper .sidebar .profile img {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: block;
  }

  .wrapper .sidebar .profile h3 {
    color: #8d599f;
    margin: 10px 0 5px;
  }

  .wrapper .sidebar .profile p {
    color: #666;
    font-size: 14px;
  }

  .wrapper .sidebar ul li a {
    padding: 13px 30px;
    display: block;
    border-bottom: 1px solid #ececec;
    color: #666;
    font-size: 14px;
    position: relative;
  }

  .wrapper .sidebar ul li a .icon {
    color: #c7cfdb;
    width: 30px;
    display: inline-block;
  }

  .wrapper .sidebar ul li a:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 3px;
    height: 100%;
    background: #8d599f;
    display: none;
  }

  .wrapper .sidebar ul li a:hover,
  .wrapper .sidebar ul li a.active {
    color: #8d599f;
    background: linear-gradient(to right, #fff, #f6edfc)
  }

  .wrapper .sidebar ul li a:hover .icon,
  .wrapper .sidebar ul li a.active .icon {
    color: #8d599f;
  }

  .wrapper .sidebar ul li a:hover:before,
  .wrapper .sidebar ul li a.active:before {
    display: block;
  }

  .wrapper .section {
    width: calc(100% - 225px);
    margin-left: 225px;
    transition: all 0.5s ease;
  }

  .wrapper .section .top_navbar {
    background: #fff;
    height: 50px;
    border: 1px solid #f5f6fa;
    display: flex;
    align-items: center;
    padding: 0 30px;
  }

  .wrapper .section .top_navbar .hamburger a {
    font-size: 24px;
    color: #8d599f;
  }

  .wrapper .section .top_navbar .hamburger a:hover {
    color: #cbaede;
  }

  .wrapper .section .container {
    margin: 30px;
    background: #fff;
    padding: 50px;
    line-height: 28px;
  }

  body.active .wrapper .sidebar {
    left: -225px;
  }

  body.active .wrapper .section {
    margin-left: 0;
    width: 100%;
  }
</style>
<html>

<head>
  <meta charset="utf-8">
  <title>Learner Info</title>
  
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../db/dbconnection.php';

$learnerID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'"; 
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner -> fetch_object();

$sql = "SELECT LearnerFirstName, LearnerLastName, LearnerEmail, Cohort, ApprenticeshipName, EmployerID FROM learner WHERE UniqueLearnerNumber = ? ";

$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $learnerID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $LearnerFirstName, $LearnerLastName, $LearnerEmail, $Cohort, $AppreticeshipName, $EmployerID);
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
        <li><a href="../users/learner/learner.php">
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
        <li><a href="../learnerinfo/learnerinfo.php" class="active">
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