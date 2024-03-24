<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Submissions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" type="text/css" href="../../css/tabledesign.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];

$queryLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = ?";
$stmtLearner = mysqli_prepare($mysqli, $queryLearner);
mysqli_stmt_bind_param($stmtLearner, "s", $userID);
mysqli_stmt_execute($stmtLearner);
$resultLearner = mysqli_stmt_get_result($stmtLearner);
$obj = $resultLearner->fetch_object();
mysqli_stmt_close($stmtLearner);

$tableRows = array();
$progressDetails = array();

// Fetch ProgressID based on userID
$sql = "SELECT ProgressID FROM learner WHERE UniqueLearnerNumber = ?";
$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $userID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
while ($row = $result->fetch_assoc()) {
    $ProgressID = $row['ProgressID'];

    // Fetch UnitID and CurrentStatus based on ProgressID using the progressunits table
    $sqlProgressUnits = "SELECT UnitID, CurrentStatus FROM progressunits WHERE ProgressID = ?";
    $stmtProgressUnits = mysqli_prepare($mysqli, $sqlProgressUnits);
    mysqli_stmt_bind_param($stmtProgressUnits, "i", $ProgressID);
    mysqli_stmt_execute($stmtProgressUnits);
    $resultProgressUnits = mysqli_stmt_get_result($stmtProgressUnits); 
    while ($rowPU = $resultProgressUnits->fetch_assoc()) {
        $progressDetails[] = $rowPU;
    }
    mysqli_stmt_close($stmtProgressUnits);
}
mysqli_stmt_close($stmt);

foreach ($progressDetails as $detail) {
    $UnitID = $detail['UnitID'];
    $CurrentStatus = $detail['CurrentStatus'];

    $statusClass = ''; 
    if ($CurrentStatus === 'Overdue') {
        $statusClass = 'status-overdue'; 
    } elseif ($CurrentStatus === 'Completed') {
        $statusClass = 'status-completed'; 
    }

    // Fetch UnitName and SubmissionDate for each UnitID
    $sqlUnits = "SELECT UnitName, SubmissionDate FROM units WHERE UnitID = ?";
    $stmtUnits = mysqli_prepare($mysqli, $sqlUnits);
    mysqli_stmt_bind_param($stmtUnits, "i", $UnitID);
    mysqli_stmt_execute($stmtUnits);
    $resultUnits = mysqli_stmt_get_result($stmtUnits); 
    while ($rowU = $resultUnits->fetch_assoc()) {
        $UnitName = $rowU['UnitName'];
        $SubmissionDate = $rowU['SubmissionDate'];
        $tableRows[] = "<tr><td>$UnitName</td><td>$SubmissionDate</td><td class='$statusClass'>$CurrentStatus</td></tr>";
    }
    mysqli_stmt_close($stmtUnits);
}

mysqli_close($mysqli);

?>

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
                <li><a href="learner.php">
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
                <li><a href="upload-submissions.php" class="active">
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

                <h2>Submission Progress</h2>
                <br>

                <table style="width:100%">
                    <thead>
                        <tr>
                            <th>Units</th>
                            <th>Due</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach ($tableRows as $row) {
                        echo $row;
                    } ?>
                </table>
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