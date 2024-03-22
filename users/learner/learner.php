<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Learner Progress</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerchart.css">

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$userID'";
$resultLearner = $mysqli->query($queryLearner);

$obj = $resultLearner->fetch_object();
$progressID = $obj -> ProgressID;

  $queryProgressRAG = "SELECT * FROM progressunits WHERE ProgressID = '$progressID'"; 
  $resultProgressRAG = $mysqli -> query($queryProgressRAG);
  $getProgressRAG = $resultProgressRAG -> num_rows;

  $queryProgressRAGCompleted = "SELECT * FROM progressunits WHERE ProgressID = '$progressID' AND CurrentStatus = 'Completed'"; 
  $resultProgressRAGCompleted = $mysqli -> query($queryProgressRAGCompleted);
  $getProgressRAGCompleted = $resultProgressRAGCompleted -> num_rows;

  $valueProgress = (($getProgressRAGCompleted/$getProgressRAG)*100 );

  $queryOTJRAG = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$userID'"; 
  $resultOTJRAG = $mysqli -> query($queryOTJRAG);
  $getOTJRAG = $resultOTJRAG -> fetch_object();
  $ExpectedHours = $getOTJRAG -> ExpectedHours;
  $OverallHours = $getOTJRAG -> CumulativeHours;

  if ($OverallHours >= $ExpectedHours){
    $valueOTJ = 100;
  }
  else if ($OverallHours >= ($ExpectedHours-10)){
    $valueOTJ = 50;
  }
  else if ($OverallHours < ($ExpectedHours-10)){
    $valueOTJ = 10;
  }

  $queryEmployerRAG = "SELECT * FROM employmentProgress WHERE UniqueLearnerNumber = '$userID'"; 
  $resultEmployerRAG = $mysqli -> query($queryEmployerRAG);
  $getEmployerRAG = $resultEmployerRAG -> fetch_object();
  $employerRAG = $getEmployerRAG -> EmploymentRAG;

  if ($employerRAG == "Green"){
    $valueEMP = 100;
  }
  else if ($employerRAG == "Amber"){
    $valueEMP = 50;
  }
  else if ($employerRAG == "Red"){
    $valueEMP = 10;
  }


//checks the CurrentStatus of all units where $userID.
//progress RAG will depend on Units completed / Total Units * 100%
//0-39% = red   40-79% = amber   80-100% = green
//the calculation will only be done once the submission date is passed
?>
<script> 
  let Progressvalue = parseInt('<?php echo $valueProgress ?>')
  console.log(Progressvalue)
  let OTJvalue = parseInt('<?php echo $valueOTJ; ?>')
  let EMPvalue = parseInt('<?php echo $valueEMP; ?>')
</script>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="../../images/logos/gtalogo.png" alt="profile_picture">
        <?php
        echo "<h3>{$obj->LearnerFirstName} {$obj->LearnerLastName}</h3>";
        ?>
        <p>Learner</p>
      </div>
      <ul>
        <li><a href="learner.php" class="active">
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
        <li><a href="view-employer.php">
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
            <span class="icon"><i class="fas fa-user-shield"></i></span>
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
        <h2 class="chart-heading">Learner Progress</h2>

        <div id="myChart" style="width:100%; max-width:600px; height:500px; margin:auto;"></div> 
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="../sharedfiles/learnerprogress/barchart.js"></script>
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