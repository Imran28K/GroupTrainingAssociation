<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
require_once ("../../db/dbconnection.php");
$tutorID = $_SESSION['userID'];

$querySessions = "SELECT * FROM learner"; 
$resultSessions = $mysqli->query($querySessions); 

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Apprenticeship Templates</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){
$learnerID = $_POST['learnerID'];

$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();
?>

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
        <h1>Edit Templates</h1>
        <?php
          $obj = $resultSessions -> fetch_object();
          $learnerID = $obj -> UniqueLearnerNumber;
          $learnerIDString = sprintf($learnerID);

          $queryGetLearners = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerIDString'"; 
          $resultGetLearners = $mysqli->query($queryGetLearners); 
          $objLearner = $resultGetLearners -> fetch_object();
          $TemplateID = $objLearner -> TemplateID;

          $queryTemplate = "SELECT * FROM apprenticeshiptemplates WHERE ApprenticeshipTemplateID = '$TemplateID'"; 
          $resultTemplate = $mysqli->query($queryTemplate);
          $objTemplate = $resultTemplate -> fetch_object();
          $GroupID1 = $objTemplate -> Group1;
          $GroupID2 = $objTemplate -> Group2;
          $GroupID3 = $objTemplate -> Group3;
          $GroupID4 = $objTemplate -> Group4;
          $GroupID5 = $objTemplate -> Group5;
          $GroupID6 = $objTemplate -> Group6;
          $GroupID7 = $objTemplate -> Group7;
          $GroupID8 = $objTemplate -> Group8;
          $GroupID9 = $objTemplate -> Group9;
          $GroupID10 = $objTemplate -> Group10;
          $GroupID11 = $objTemplate -> Group11;
          $GroupID12 = $objTemplate -> Group12;
          $GroupID13 = $objTemplate -> Group13;
          $GroupID14 = $objTemplate -> Group14;
          $GroupID15 = $objTemplate -> Group15;
          $GroupID16 = $objTemplate -> Group16;
          $GroupID17 = $objTemplate -> Group17;
          $GroupID18 = $objTemplate -> Group18;
          $GroupID19 = $objTemplate -> Group19;
          $GroupID20 = $objTemplate -> Group20;
          $GroupID21 = $objTemplate -> Group21;
          $GroupID22 = $objTemplate -> Group22;
          $GroupID23 = $objTemplate -> Group23;
          $GroupID24 = $objTemplate -> Group24;
          $GroupID25 = $objTemplate -> Group25;
          $GroupID26 = $objTemplate -> Group26;
          $GroupID27 = $objTemplate -> Group27;
          $GroupID28 = $objTemplate -> Group28;
          $GroupID29 = $objTemplate -> Group29;
          $GroupID30 = $objTemplate -> Group30;
          $GroupID31 = $objTemplate -> Group31;
          $GroupID32 = $objTemplate -> Group32;
          $GroupID33 = $objTemplate -> Group33;
          $GroupID34 = $objTemplate -> Group34;

          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID1'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits1 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID2'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits2 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID3'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits3 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID4'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits4 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID5'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits5 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID6'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits6 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID7'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits7 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID8'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits8 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID9'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits9 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID10'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits10 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID11'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits11 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID12'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits12 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID13'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits13 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID14'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits14 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID15'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits15 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID16'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits16 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID17'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits17 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID18'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits18 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID19'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits19 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID20'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits20 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID21'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits21 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID22'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits22 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID23'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits23 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID24'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits24 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID25'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits25 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID26'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits26 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID27'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits27 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID28'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits28 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID29'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits29 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID30'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits30 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID31'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits31 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID32'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits32 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID33'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits33 = $resultUnits -> fetch_object();
          $queryUnits = "SELECT * FROM units WHERE UnitID = '$GroupID34'"; 
          $resultUnits = $mysqli->query($queryUnits);
          $objUnits34 = $resultUnits -> fetch_object();

            echo"
            <table>
            <form action='../../credentials/query/createCustomTemplate.php' method='post'>
            <tr>
                <td><label for='LearnerName'>Learner name: </label></td>
                <td><input type='text' name='LearnerName' value='{$objLearner->LearnerFirstName} {$objLearner->LearnerLastName}' required /></br></td>
            </tr>
            <tr>
                <td><label for='ApprenticeshipName'>Apprenticeship: </label></td>
                <td><input type='text' name='ApprenticeshipName' value='{$objTemplate->apprenticeshipName}' required /></br></td>
            </tr>
            <tr>
                <td><label for='NumberOfYears'>Number of Years: </label></td>
                <td><input type='text' name='NumberOfYears' value='{$objTemplate->NumberOfYears}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group1'>Group 1: </label></td>
                <td><input type='text' name='Group1' value='{$objUnits1->UnitName}' required /></td>
                <td></td>
                <td><label for='Group1Date'>Group 1 Submission Date: </label></td>
                <td><input type='text' name='Group1Date' value='{$objUnits1->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group2'>Group 2: </label></td>
                <td><input type='text' name='Group2' value='{$objUnits2->UnitName}' required /></td>
                <td></td>
                <td><label for='Group2Date'>Group 2 Submission Date: </label></td>
                <td><input type='text' name='Group2Date' value='{$objUnits2->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group3'>Group 3: </label></td>
                <td><input type='text' name='Group3' value='{$objUnits3->UnitName}' required /></td>
                <td></td>
                <td><label for='Group3Date'>Group 3 Submission Date: </label></td>
                <td><input type='text' name='Group3Date' value='{$objUnits3->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group4'>Group 4: </label></td>
                <td><input type='text' name='Group4' value='{$objUnits4->UnitName}' required /></td>
                <td></td>
                <td><label for='Group4Date'>Group 4 Submission Date: </label></td>
                <td><input type='text' name='Group4Date' value='{$objUnits4->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group5'>Group 5: </label></td>
                <td><input type='text' name='Group5' value='{$objUnits5->UnitName}' required /></td>
                <td></td>
                <td><label for='Group5Date'>Group 5 Submission Date: </label></td>
                <td><input type='text' name='Group5Date' value='{$objUnits5->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group6'>Group 6: </label></td>
                <td><input type='text' name='Group6' value='{$objUnits1->UnitName}' required /></td>
                <td></td>
                <td><label for='Group6Date'>Group 6 Submission Date: </label></td>
                <td><input type='text' name='Group6Date' value='{$objUnits6->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group7'>Group 7: </label></td>
                <td><input type='text' name='Group7' value='{$objUnits1->UnitName}' required /></td>
                <td></td>
                <td><label for='Group7Date'>Group 7 Submission Date: </label></td>
                <td><input type='text' name='Group7Date' value='{$objUnits7->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group8'>Group 8: </label></td>
                <td><input type='text' name='Group8' value='{$objUnits8->UnitName}' required /></td>
                <td></td>
                <td><label for='Group8Date'>Group 8 Submission Date: </label></td>
                <td><input type='text' name='Group8Date' value='{$objUnits8->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group9'>Group 9: </label></td>
                <td><input type='text' name='Group9' value='{$objUnits9->UnitName}' required /></td>
                <td></td>
                <td><label for='Group9Date'>Group 9 Submission Date: </label></td>
                <td><input type='text' name='Group9Date' value='{$objUnits9->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group10'>Group 10: </label></td>
                <td><input type='text' name='Group10' value='{$objUnits10->UnitName}' required /></td>
                <td></td>
                <td><label for='Group10Date'>Group 10 Submission Date: </label></td>
                <td><input type='text' name='Group10Date' value='{$objUnits10->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group11'>Group 11: </label></td>
                <td><input type='text' name='Group11' value='{$objUnits11->UnitName}' required /></td>
                <td></td>
                <td><label for='Group11Date'>Group 11 Submission Date: </label></td>
                <td><input type='text' name='Group11Date' value='{$objUnits11->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group12'>Group 12: </label></td>
                <td><input type='text' name='Group12' value='{$objUnits12->UnitName}' required /></td>
                <td></td>
                <td><label for='Group12Date'>Group 12 Submission Date: </label></td>
                <td><input type='text' name='Group12Date' value='{$objUnits12->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group13'>Group 13: </label></td>
                <td><input type='text' name='Group13' value='{$objUnits13->UnitName}' required /></td>
                <td></td>
                <td><label for='Group13Date'>Group 13 Submission Date: </label></td>
                <td><input type='text' name='Group13Date' value='{$objUnits13->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group14'>Group 14: </label></td>
                <td><input type='text' name='Group14' value='{$objUnits14->UnitName}' required /></td>
                <td></td>
                <td><label for='Group14Date'>Group 14 Submission Date: </label></td>
                <td><input type='text' name='Group14Date' value='{$objUnits14->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group15'>Group 15: </label></td>
                <td><input type='text' name='Group15' value='{$objUnits15->UnitName}' required /></td>
                <td></td>
                <td><label for='Group15Date'>Group 15 Submission Date: </label></td>
                <td><input type='text' name='Group15Date' value='{$objUnits15->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group16'>Group 16: </label></td>
                <td><input type='text' name='Group16' value='{$objUnits16->UnitName}' required /></td>
                <td></td>
                <td><label for='Group16Date'>Group 16 Submission Date: </label></td>
                <td><input type='text' name='Group16Date' value='{$objUnits16->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group17'>Group 17: </label></td>
                <td><input type='text' name='Group17' value='{$objUnits17->UnitName}' required /></td>
                <td></td>
                <td><label for='Group17Date'>Group 17 Submission Date: </label></td>
                <td><input type='text' name='Group17Date' value='{$objUnits17->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group18'>Group 18: </label></td>
                <td><input type='text' name='Group18' value='{$objUnits18->UnitName}' required /></td>
                <td></td>
                <td><label for='Group18Date'>Group 18 Submission Date: </label></td>
                <td><input type='text' name='Group18Date' value='{$objUnits18->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group19'>Group 19: </label></td>
                <td><input type='text' name='Group19' value='{$objUnits19->UnitName}' required /></td>
                <td></td>
                <td><label for='Group19Date'>Group 19 Submission Date: </label></td>
                <td><input type='text' name='Group19Date' value='{$objUnits19->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group20'>Group 20: </label></td>
                <td><input type='text' name='Group20' value='{$objUnits20->UnitName}' required /></td>
                <td></td>
                <td><label for='Group20Date'>Group 20 Submission Date: </label></td>
                <td><input type='text' name='Group20Date' value='{$objUnits20->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group21'>Group 21: </label></td>
                <td><input type='text' name='Group21' value='{$objUnits21->UnitName}' required /></td>
                <td></td>
                <td><label for='Group21Date'>Group 21 Submission Date: </label></td>
                <td><input type='text' name='Group21Date' value='{$objUnits21->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group22'>Group 22: </label></td>
                <td><input type='text' name='Group22' value='{$objUnits22->UnitName}' required /></td>
                <td></td>
                <td><label for='Group22Date'>Group 22 Submission Date: </label></td>
                <td><input type='text' name='Group22Date' value='{$objUnits22->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group23'>Group 23: </label></td>
                <td><input type='text' name='Group23' value='{$objUnits23->UnitName}' required /></td>
                <td></td>
                <td><label for='Group23Date'>Group 23 Submission Date: </label></td>
                <td><input type='text' name='Group23Date' value='{$objUnits23->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group24'>Group 24: </label></td>
                <td><input type='text' name='Group24' value='{$objUnits24->UnitName}' required /></td>
                <td></td>
                <td><label for='Group24Date'>Group 24 Submission Date: </label></td>
                <td><input type='text' name='Group24Date' value='{$objUnits24->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group25'>Group 25: </label></td>
                <td><input type='text' name='Group25' value='{$objUnits25->UnitName}' required /></td>
                <td></td>
                <td><label for='Group25Date'>Group 25 Submission Date: </label></td>
                <td><input type='text' name='Group25Date' value='{$objUnits25->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group26'>Group 26: </label></td>
                <td><input type='text' name='Group26' value='{$objUnits26->UnitName}' required /></td>
                <td></td>
                <td><label for='Group26Date'>Group 26 Submission Date: </label></td>
                <td><input type='text' name='Group26Date' value='{$objUnits26->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group27'>Group 27: </label></td>
                <td><input type='text' name='Group27' value='{$objUnits27->UnitName}' required /></td>
                <td></td>
                <td><label for='Group27Date'>Group 27 Submission Date: </label></td>
                <td><input type='text' name='Group27Date' value='{$objUnits27->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group28'>Group 28: </label></td>
                <td><input type='text' name='Group28' value='{$objUnits28->UnitName}' required /></td>
                <td></td>
                <td><label for='Group28Date'>Group 28 Submission Date: </label></td>
                <td><input type='text' name='Group28Date' value='{$objUnits28->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group29'>Group 29: </label></td>
                <td><input type='text' name='Group29' value='{$objUnits29->UnitName}' required /></td>
                <td></td>
                <td><label for='Group29Date'>Group 29 Submission Date: </label></td>
                <td><input type='text' name='Group29Date' value='{$objUnits29->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group30'>Group 30: </label></td>
                <td><input type='text' name='Group30' value='{$objUnits30->UnitName}' required /></td>
                <td></td>
                <td><label for='Group30Date'>Group 30 Submission Date: </label></td>
                <td><input type='text' name='Group30Date' value='{$objUnits30->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group31'>Group 31: </label></td>
                <td><input type='text' name='Group31' value='{$objUnits31->UnitName}' required /></td>
                <td></td>
                <td><label for='Group31Date'>Group 31 Submission Date: </label></td>
                <td><input type='text' name='Group31Date' value='{$objUnits31->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group32'>Group 32: </label></td>
                <td><input type='text' name='Group32' value='{$objUnits32->UnitName}' required /></td>
                <td></td>
                <td><label for='Group32Date'>Group 32 Submission Date: </label></td>
                <td><input type='text' name='Group32Date' value='{$objUnits32->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group33'>Group 33: </label></td>
                <td><input type='text' name='Group33' value='{$objUnits33->UnitName}' required /></td>
                <td></td>
                <td><label for='Group33Date'>Group 33 Submission Date: </label></td>
                <td><input type='text' name='Group33Date' value='{$objUnits33->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <td><label for='Group34'>Group 34: </label></td>
                <td><input type='text' name='Group34' value='{$objUnits34->UnitName}' required /></td>
                <td></td>
                <td><label for='Group34Date'>Group 34 Submission Date: </label></td>
                <td><input type='text' name='Group34Date' value='{$objUnits34->SubmissionDate}' required /></br></td>
            </tr>
            <tr>
                <input type='hidden' name='learnerID' value='$learnerIDString' /> 
                <td><button type='submit'>Save Template</button></td>
            </tr>
            </form>
            </table>";       
        ?>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='templateChoice.php'> Back </a> </li>
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