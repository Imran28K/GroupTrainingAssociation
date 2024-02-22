<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learner Information</title>

    
    <link rel="stylesheet" href="style.css">
</head>

<?php

session_start();
require_once '../db/dbconnection.php';
$learnerID =  $_SESSION['userID'];

$sql = "SELECT LearnerFirstName, LearnerLastName, LearnerEmail, Cohort, ApprenticeshipName FROM learner WHERE UniqueLearnerNumber = ? ";

$stmt = mysqli_prepare($mysqli, $sql);

mysqli_stmt_bind_param($stmt, "s", $learnerID);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $LearnerFirstName, $LearnerLastName, $LearnerEmail, $Cohort, $AppreticeshipName);


if (mysqli_stmt_fetch($stmt)) {
    
} else {
    echo "0 results";
}

mysqli_stmt_close($stmt);

mysqli_close($mysqli);

?>


<body>
    
    <div class="navbar-top">
        <div class="title">
            <h1>Learner Information</h1>
        </div>
    </div>
    
    <div class="sidenav">
        <div class="profile">
          

            <div class="name">
                GTA
            </div>
            
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="#settings">Settings</a>
                <hr align="center">
            </div>
        </div>
    </div>
    
    <div class="main">
       
        <div class="card">
            <div class="card-body">
               
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $LearnerFirstName ." " . $LearnerLastName; ?> </td>
                        </tr>
                        <tr>
                            <td>ULN</td>
                            <td>:</td>
                            <td>1000000001-LVMSL3</td>
                        </tr>
                        <tr>
                            <td>Employer</td>
                            <td>:</td>
                            <td>Employer 10</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>dave34@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Cohort</td>
                            <td>:</td>
                            <td>Sheffield, UK</td>
                        </tr>
                        <tr>
                            <td>Apprenticeship</td>
                            <td>:</td>
                            <td>Light Vehicle L3</td>
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
    <!-- End -->
</body>
</html>