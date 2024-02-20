<!DOCTYPE html>
<html lang="en">

<?php 
$sessionID = $_POST[sessionID];
require_once '../../db/dbconnection.php';
$queryLots = "SELECT * FROM attendance WHERE sessionID == '$UserIDLots' AND LotEndTime > '$now'";
$resultLots = $mysqli->query($queryLots); 
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
        <?php while ($obj = $resultLots -> fetch_object());
        echo"<tr>
            <td>Learner</td>
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