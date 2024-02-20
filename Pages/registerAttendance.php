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
//$queryAttendance = "SELECT * FROM attendance WHERE SessionID == '9'";
//$resultAttendance = $mysqli->query($queryAttendance);

$queryAttendance = "SELECT * FROM attendance WHERE SessionID = '$SessionID'"; 
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
        <?php while ($obj = $resultAttendance -> fetch_object());
        //$learnerID = {$obj -> UniqueLearnerNumber};
        $queryLearner = "SELECT * FROM learners WHERE UniqueLearnerNumber = '{$obj -> UniqueLearnerNumber}'";
        $resultLearner = $mysqli->query($queryLearner);
        $obj2 = $resultLearner -> fetch_object();
        echo"<tr>
            <td>{$obj2 -> LearnerFirstName}.''.{$obj -> LearnerLastName}</td>
            <td>
                <form action='/query/register.php'>
                    <input type='checkbox' id='attended' name='attended' value='attended'>
                    <label for='attended'> Attended </label><br>
                    <input type='submit' value='Confirm'>
                </form>
            </td>
        </tr>
        </table>"
        ?>
    </div>
<?php include '../include/footer.php'; ?>
</body>

</html>