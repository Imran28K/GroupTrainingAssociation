<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>attendance landing page</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- CSS only -->

<!-- JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-fE3GAyYdAMWSR9EJp0IhPDiw6PRx41HjrFI12wPz/D9V9SgJb3cc7i2JhuSvmXPA" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk+5KVcL1e/JTq8Ck+8M+eG2lPUfww/tq+X" crossorigin="anonymous"></script>

  </head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

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
    <h2>Set learners' email</h2>
    <?php
    $queryLearner = "SELECT * FROM learner WHERE LearnerEmail = ''"; 
    $resultLearner = $mysqli->query($queryLearner);
    $learnerCheck = $resultLearner -> num_rows;

    if ($learnerCheck > 0){
    ?>
    <table>
        <tr>
            <td>Learner name</td>
            <td>Email</td>
        </tr>
    <?php
    while ($objLearner = $resultLearner -> fetch_object()){
        $learnerID = $objLearner -> UniqueLearnerNumber;
        echo"<tr>
                <td>{$objLearner -> LearnerFirstName} {$objLearner -> LearnerLastName}</td>
                <form action='../../credentials/query/assigningEmail.php' method='post'>
                <td>
                  <input type='text' name='email' value='' required />
                  <input type='hidden' name='learnerID' value='$learnerID' /> 
                </td>
                <td>
                <button type='submit'>Assign Email</button>
                </td>
                </form>
              </tr>";
    }?>
    </table>
    <?php
    } else {
    ?>
    <h3>There are no learners without emails</h3>
    <?php } ?>
    </div>
    </body>
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>