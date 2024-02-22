<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];

$querySessions = "SELECT * FROM learner WHERE TutorID = $tutorID"; 
$resultSessions = $mysqli->query($querySessions); 

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View learners tutor</title>
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>
<div class="container">
        <h2 class="chart-heading">Learner Progress</h2>
        <div class="programming-stats">
          <div class="chart-container">
            <canvas class="my-chart"></canvas>
          </div>

          <div class="details">
            <ul></ul>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../../learnerprogress/main.js"></script>
      </div>
</body>

</html>