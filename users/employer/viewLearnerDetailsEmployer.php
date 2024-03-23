<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>view learner details</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerchart.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$employerID = $_SESSION['userID'];

$queryDetails = "SELECT * FROM employer WHERE EmployerID = '$employerID'"; 
$resultDetails= $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();

$learnerID = $_POST['uniqueLearnerNumber'];
$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'"; 
$resultLearner = $mysqli->query($queryLearner);
$getLearnerDetails = $resultLearner -> fetch_object();
$progressID = $getLearnerDetails -> ProgressID;

$queryProgressRAG = "SELECT * FROM progressunits WHERE ProgressID = '$progressID'"; 
$resultProgressRAG = $mysqli -> query($queryProgressRAG);
$getProgressRAG = $resultProgressRAG -> num_rows;

$queryProgressRAGCompleted = "SELECT * FROM progressunits WHERE ProgressID = '$progressID' AND CurrentStatus = 'Completed'"; 
$resultProgressRAGCompleted = $mysqli -> query($queryProgressRAGCompleted);
$getProgressRAGCompleted = $resultProgressRAGCompleted -> num_rows;

if ($getProgressRAGCompleted <= 0){
  $getProgressRAGCompleted = 1;
}
if ($getProgressRAG <= 0){
  $getProgressRAG = 1;
}
$valueProgress = (($getProgressRAGCompleted/$getProgressRAG)*100 );

$queryOTJRAG = "SELECT * FROM otjhours WHERE UniqueLearnerNumber = '$learnerID'"; 
$resultOTJRAG = $mysqli -> query($queryOTJRAG);
$getOTJRAG = $resultOTJRAG -> fetch_object();
$ExpectedHours = $getOTJRAG -> ExpectedHours;
$OverallHours = $getOTJRAG -> CumulativeHours;

if ($ExpectedHours <= 0){
  $ExpectedHours = 1;
}
if ($OverallHours <= 0){
  $OverallHours = 1;
}
$valueOTJ = (($OverallHours/$ExpectedHours)*100);
if ($valueOTJ > 100){
  $valueOTJ = 100;
}

$queryEmployerRAG = "SELECT * FROM employmentProgress WHERE UniqueLearnerNumber = '$learnerID'"; 
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
?>
<script> 
  let Progressvalue = parseInt('<?php echo $valueProgress ?>')
  let OTJvalue = parseInt('<?php echo $valueOTJ; ?>')
  let EMPvalue = parseInt('<?php echo $valueEMP; ?>')
</script>

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
        <li><a href="viewLearnersEmployer.php"  class="active">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View employees</span>
          </a>
        </li>
        <li><a href="chooseReport.php">
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
        <?php echo"<h2>{$getLearnerDetails -> LearnerFirstName} {$getLearnerDetails -> LearnerLastName}'s progress</h2>"?>
        <h3 class="chart-heading">Learner Progress</h3>

        <div id="myChart" style="width:100%; max-width:600px; height:500px; margin:auto;"></div> 
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="../sharedfiles/learnerprogress/barchart.js"></script>
          <div class="details">
            <ul></ul>
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