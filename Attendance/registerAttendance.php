<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if ($_SESSION['sessionID'] == ""){
    $sessionID = $_POST['sessionID'];
    $_SESSION['sessionID'] = $sessionID;
}
else {
    $sessionID = $_SESSION['sessionID'];
}

require_once ("../db/dbconnection.php");

$querySessions = "SELECT * FROM registersessions WHERE SessionID = $sessionID"; 
$resultSessions = $mysqli->query($querySessions); 

$getApprenticeship = $resultSessions -> fetch_object();
$apprenticeship = $getApprenticeship -> apprenticeshipName;
$apprenticeshipString = strval($apprenticeship);

$queryAddLearners = "SELECT * FROM learner WHERE ApprenticeshipName = '$apprenticeshipString'"; 
$resultAddLearners= $mysqli->query($queryAddLearners);

while ($getLearners = $resultAddLearners -> fetch_object()){
$learner = $getLearners -> UniqueLearnerNumber;

$queryAttendanceCheck = "SELECT UniqueLearnerNumber FROM attendance WHERE SessionID = $sessionID"; 
$resultAttendanceCheck = $mysqli->query($queryAttendanceCheck);

    $getLearnerCheck = $resultAttendanceCheck -> fetch_object();
    $learnerCheck = $getLearnerCheck -> UniqueLearnerNumber;

if ($learnerCheck != $learner){
$queryAddLearners = "INSERT INTO attendance (UniqueLearnerNumber, SessionID, Present) VALUES ('$learner', '$sessionID', 'No')"; 
$resultAddLearners= $mysqli->query($queryAddLearners);
header('location:http://localhost/GroupTrainingAssociation/attendance/registerAttendance.php');
}
}
$queryAttendance = "SELECT * FROM attendance WHERE SessionID = $sessionID"; 
$resultAttendance = $mysqli->query($queryAttendance); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>
<?php include '../include/navbar.php'; ?>
    <div class="attendance-container">
        <h1>Attendance</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Present?</td>
        </tr>
        <?php while ($obj = $resultAttendance -> fetch_object()){
        $learnerID = $obj -> UniqueLearnerNumber;

        $queryLearner = "SELECT * FROM learner LEFT JOIN attendance ON attendance.UniqueLearnerNumber = learner.UniqueLearnerNumber AND attendance.sessionID = '$sessionID' WHERE learner.UniqueLearnerNumber = '$learnerID'";    
        $resultLearner = $mysqli->query($queryLearner);
        $obj2 = $resultLearner -> fetch_object();
        if ($obj -> Present == "No"){
        echo"<tr>
            <td>{$obj2 -> LearnerFirstName} {$obj2 -> LearnerLastName}</td>
            <td>
                {$obj -> Present}
            </td>
            <td> 
                <form action='../credentials/query/register.php' name='attendance' method='post'>
                    <input type='hidden' id='learnerID' name='learnerID' value=$learnerID>
                    <input type='hidden' id='SessionID' name='sessionID' value=$sessionID>
                    <input type='submit' value='Mark present'>
                </form>
            </td>
        </tr>";
        }
        else if ($obj -> Present == "Yes"){
            echo"<tr>
            <td>{$obj2 -> LearnerFirstName} {$obj2 -> LearnerLastName}</td>
            <td>
                {$obj -> Present}
            </td>
            <td> 
                <form action='../credentials/query/unregister.php' name='attendance' method='post'>
                    <input type='hidden' id='learnerID' name='learnerID' value=$learnerID>
                    <input type='hidden' id='SessionID' name='sessionID' value=$sessionID>
                    <input type='submit' value='Mark not present'>
                </form>
            </td>
        </tr>"; 
        }
        }        ?>
        </table>
    </div>
<?php include '../include/footer.php'; ?>
</body>

</html>