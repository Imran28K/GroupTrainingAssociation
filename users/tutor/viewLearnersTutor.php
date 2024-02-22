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
    <div class="attendance-container">
        <h1>View Learners</h1>
        <table>
        <tr>
            <td>Learner name</td>
            <td>Apprenticeship</td>
        </tr>
        <?php while ($obj = $resultSessions -> fetch_object()){
        $learnerID = $obj -> UniqueLearnerNumber;
        echo"<tr>
            <td>{$obj -> LearnerFirstName} {$obj -> LearnerLastName}</td>
            <td>
                {$obj -> ApprenticeshipName}
            </td>
            <td>
                <form action='../../learnerprogress/learnerprogress.php' name='uniqueLearnerNumber' method='post'>
                <input type='hidden' id='uniqueLearnerNumber' name='uniqueLearnerNumber' value={$obj -> UniqueLearnerNumber}>
                <input type='submit' value='View progress'>
            </form>
            </td>
            
        </tr>";
        }        ?>
        </table>

    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='tutor.php'> Back to tutor page </a> </li>
    </ul>
    </div>
</body>

</html>