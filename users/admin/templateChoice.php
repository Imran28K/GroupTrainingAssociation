<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");

$queryLearners = "SELECT * FROM learner"; 
$resultLearners = $mysqli->query($queryLearners); 

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryDetails = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Choice</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            padding: 30px 0;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .section {
            margin-left: 250px;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table td {
            background-color: #f9f9f9;
        }

        .nav-stacked li {
            margin-bottom: 10px;
        }
    </style>
</head>

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
        <h1>Learner accounts</h1>
        <table>
          <tr>
            <th>Learner name</th>
            <th>Apprenticeship</th>
            <th>Action</th>
          </tr>
          <?php 
          while ($obj = $resultLearners -> fetch_object()){
            $template = $obj -> TemplateID;
            $queryTemplate = "SELECT * FROM apprenticeshiptemplates WHERE ApprenticeshipTemplateID = '$template'"; 
            $resultTemplate = $mysqli->query($queryTemplate);
            $objTemplate = $resultTemplate -> fetch_object();
            echo "<tr>
              <td>{$obj -> LearnerFirstName} {$obj -> LearnerLastName}</td>
              <td>{$objTemplate -> apprenticeshipName}</td>
              <td> 
                <form action='changeApprenticeshipTemplates.php' name='attendance' method='post'>
                  <input type='hidden' id='learnerID' name='learnerID' value={$obj -> UniqueLearnerNumber}>
                  <input type='submit' value='Edit Template'>
                </form>
              </td>
            </tr>"; 
          }        
          ?>
        </table>

        <ul class='nav nav-pills nav-stacked' role='tablist'>
          <li><a href='adminConsole.php'> Back </a></li>
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
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
