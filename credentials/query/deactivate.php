<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userID = $_POST['userID'];
    $userRoleCheck = $_POST['role'];
    $userIDString = sprintf($userID);
    $userRole = $_SESSION['userRole'];

    if ($userRoleCheck == 'Learner'){
        $queryActivated= "UPDATE learner SET Active = 'Inactive' WHERE UniqueLearnerNumber = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    else if ($userRoleCheck == 'Tutor'){
        $queryActivated= "UPDATE tutor SET Active = 'Inactive' WHERE TutorID = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    else if ($userRoleCheck == 'Employer'){
        $queryActivated= "UPDATE Employer SET Active = 'Inactive' WHERE EmployerID = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    header('location:../../credentials/login.php');
}
?>