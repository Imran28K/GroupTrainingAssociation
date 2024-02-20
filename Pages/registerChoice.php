<!DOCTYPE html>
<html lang="en">

<?php 
require_once ("../db/dbconnection.php");
$queryRegisterList = "SELECT * FROM registersessions";
$resultRegisterList = $mysqli->query($queryRegisterList); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>
<?php include '../include/navbar.php'; ?>
    <div class="attendance-container">
        <h1>Attendance</h1>
        <table>
        <tr>
            <td>Date</td>
            <td>Time Start</td>
            <td>Time End</td>
            <td>Select</td>
        </tr>
        <?php while ($obj = $resultRegisterList -> fetch_object()){
                    echo"
                    <tr>
                        <td>{$obj -> SessionDate}</td>
                        <td>{$obj -> TimeStart}</td>
                        <td>{$obj -> TimeEnd}</td>
                        <td>
                    <form action='registerAttendance.php' name='sessionID' method='post'>
                    <input type='hidden' id='sessionID' name='sessionID' value='{$obj->SessionID}'>
                    <input type='submit' value='Select Date'>
                    </form>
                    </td></tr>";
        }?>
        </table>
    </div>
<?php include '../include/footer.php'; ?>
</body>

</html>