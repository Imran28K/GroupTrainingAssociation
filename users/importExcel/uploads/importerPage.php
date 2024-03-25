<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>attendance landing page</title>
    <link rel="stylesheet" type="text/css" href="../../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- CSS only -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-fE3GAyYdAMWSR9EJp0IhPDiw6PRx41HjrFI12wPz/D9V9SgJb3cc7i2JhuSvmXPA" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk+5KVcL1e/JTq8Ck+8M+eG2lPUfww/tq+X" crossorigin="anonymous"></script>

  </head>

<?php
session_start();
require_once '../../../db/dbconnection.php';

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
        <img src="../../../images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
        echo"<p>{$details->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="../../admin/admin.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="../../admin/attendanceLandingAdmin.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="../../admin/viewLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="../../admin/adminConsole.php" class="active">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Admin Page</span>
          </a>
        </li>
        <li><a href="../../admin/manageSubmissionAdmin.php">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="item">Submissions</span>
          </a>
        </li>
        <li><a href="../../../credentials/login.php">
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
<?php
//note to others, everytime you test it make sure to delete the records that get added in the database
//in learningprogress and learner table
//it will still add stuff even if it comes out as an error.
//there will be a excel sheet file added into the uploads folder where importerPage.php is whenever you import
//so delete it everytime you test it so that it wont increase the file size i guess 
if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileTmpName = $_FILES['excel']['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['xls', 'xlsx']; 

    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = date("Y.m.d-H.i.sa") . "." . $fileExtension;
        $targetDirectory = "../uploads/" . $newFileName;

        if (move_uploaded_file($fileTmpName, $targetDirectory)) {
            require '../excelReader/excel_reader2.php'; 
            require '../excelReader/SpreadsheetReader.php'; 

            $reader = new SpreadsheetReader($targetDirectory);
            foreach ($reader as $key => $row) {
                // To Skip the first row (header)
                if ($key === 0) {
                    continue;
                }
                if ($row[1] == ''){
                    header("location: ../../admin/adminConsole.php");
                }
                else {
                
                $UnitID = 1; 
                $StartDate = $row[7]; 
                $ExpectedFinishDate = $row[8];
                $ActualFinishDate = $row[9];
                $ProgrammeStatus = $row[6];
                $LearnerFirstName = $row[1];
                $LearnerLastName = $row[2];

                // Insert into `learningprogress` and get the ProgressID
                $stmtProgress = $mysqli->prepare("INSERT INTO learningprogress (UnitID, LearnerFirstName, LearnerLastName, StartDate, ExpectedFinishDate, ActualFinishDate, ProgrammeStatus, UnitUpdate) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmtProgress->bind_param("issssss", $UnitID, $LearnerFirstName, $LearnerLastName, $StartDate, $ExpectedFinishDate, $ActualFinishDate, $ProgrammeStatus);
                $stmtProgress->execute();
                $progressID = $mysqli->insert_id;
                $stmtProgress->close();

                
                $ident = $row[0]; 
                $UniqueLearnerNumber = $row[12];
                $TutorID = 2; 
                $EmployerID = 1; 
                $OTJID = 1; 
                $EmploymentID = 1; 
                $ApprenticeshipID = 1; 
                $TemplateID = 1; 
                $Cohort = $row[3]; 
                $Site = $row[4]; 
                $learnerExportStatus = $row[10];
                $qualificationAimDescription = $row[13];
                $achievedTarget = $row[17];
                $DayReleaseDay = $row[18]; 
                $Active = 'Active'; 

                $queryCheckTemplate = "SELECT * FROM apprenticeshiptemplates WHERE ApprenticeshipTemplateID = '$ApprenticeshipID'"; 
                $resultCheckTemplate = $mysqli->query($queryCheckTemplate); 
                $TemplateExists = $resultCheckTemplate -> num_rows;
                if ($TemplateExists > 0 ) {
                    $getTemplateName = $resultCheckTemplate -> fetch_object();
                    $templateName = $getTemplateName -> apprenticeshipName;
                }

                $stmtLearner = "INSERT INTO learner (ident, UniqueLearnerNumber, TutorID, EmployerID, ProgressID, OTJID, EmploymentID, ApprenticeshipID, TemplateID, LearnerFirstName, LearnerLastName, ApprenticeshipName, Cohort, Site, DayReleaseDay, LearnerExportStatus, Main_Qualification_Aim_Description, AchievedTarget, Active) VALUES ('$ident', '$UniqueLearnerNumber', '$TutorID', '$EmployerID', '$progressID', '$OTJID', '$EmploymentID', '$ApprenticeshipID', '$TemplateID', '$LearnerFirstName', '$LearnerLastName', '$templateName', '$Cohort', '$Site', '$DayReleaseDay', '$learnerExportStatus', '$qualificationAimDescription', '$achievedTarget', '$Active')";
                $resultLearner = $mysqli->query($stmtLearner);
                }
            }
            

            echo "<script>alert('Successfully Imported'); window.location.href = window.location.href;</script>";
        } else {
            echo "<script>alert('Error in uploading file');</script>";
        }
    } else {
        echo "<script>alert('Invalid file extension');</script>";
    }
}
?>

<body>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="excel" required>
        <button type="submit" name="import">Import</button>
    </form>
</div>
</body>
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>