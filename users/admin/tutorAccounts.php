<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");

$queryTutors = "SELECT * FROM tutor"; 
$resultTutors= $mysqli->query($queryTutors); 

$userID = $_SESSION['userID'];

$queryDetails = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
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
        <li><a href="updateLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Update learners</span>
          </a>
        </li>
        <li><a href="adminConsole.php" class="active">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Admin Page</span>
          </a>
        </li>
		    <li><a href="#">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="item">Settings</span>
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
        <h1>Tutor accountss</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Account status</td>
        </tr>
        <?php 
        while ($obj = $resultTutors -> fetch_object()){
        if ($obj -> Active == "Inactive"){
        echo"<tr>
            <td>{$obj -> TutorFirstName} {$obj -> TutorLastName}</td>
            <td>
                {$obj -> Active}
            </td>
            <td> 
                <form action='../../credentials/query/activate.php' name='attendance' method='post'>
                    <input type='hidden' id='userID' name='userID' value={$obj -> TutorID}>
                    <input type='hidden' id='role' name='role' value=Tutor>
                    <input type='submit' value='Reactivate Account'>
                </form>
            </td>
        </tr>";
        }
        else if ($obj -> Active == "Active"){
            echo"<tr>
            <td>{$obj -> TutorFirstName} {$obj -> TutorLastName}</td>
            <td>
                {$obj -> Active}
            </td>
            <td> 
                <form action='../../credentials/query/deactivate.php' name='attendance' method='post'>
                    <input type='hidden' id='userID' name='userID' value={$obj -> TutorID}>
                    <input type='hidden' id='role' name='role' value=Tutor>
                    <input type='submit' value='Deactivate Account'>
                </form>
            </td>
        </tr>"; 
        }
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='accountManagement.php'> Back to account management </a> </li>
    </ul>
    </div>

          <div class="details">
            <ul></ul>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../../learnerprogress/main.js"></script>
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