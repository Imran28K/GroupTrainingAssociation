<?php
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userID = $_POST['userID'];
    $userRoleCheck = $_POST['role'];
    $userIDString = sprintf($userID);
    $userRole = $_SESSION['userRole'];

    if ($userRoleCheck == 'Learner'){
        $queryActivated= "UPDATE learner SET Active = 'Active' WHERE UniqueLearnerNumber = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    else if ($userRoleCheck == 'Tutor'){
        $queryActivated= "UPDATE tutor SET Active = 'Active' WHERE TutorID = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    else if ($userRoleCheck == 'Employer'){
        $queryActivated= "UPDATE Employer SET Active = 'Active' WHERE EmployerID = '$userIDString'";
        $resultActivated = $mysqli->query($queryActivated);
    }
    header('location:http://localhost/GroupTrainingAssociation/users/admin/accountManagement.php');
}
?>