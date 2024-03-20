<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['TutorName'], $_POST['learnerID'])) {
    $TutorName = $_POST['TutorName'];
    $learnerID = $_POST['learnerID'];
    [$TutorFirstName, $TutorLastName] = explode(' ', $TutorName);

    if ($TutorFirstName != "" && $TutorLastName != "") {
        $queryAssigningTutors = "SELECT * FROM Tutor WHERE TutorFirstName = '$TutorFirstName' AND TutorLastName = '$TutorLastName'"; 
        $resultAssigningTutors = $mysqli->query($queryAssigningTutors); 
        $getTutorID = $resultAssigningTutors -> fetch_object();
        $TutorID = $getTutorID -> TutorID;
        $check = $resultAssigningTutors -> num_rows;

        if ($check > 0){
            $queryAssignTutor = "UPDATE learner SET TutorID = $TutorID WHERE UniqueLearnerNumber = '$learnerID'";
            $resultAssignTutor = $mysqli->query($queryAssignTutor);
            echo"successful";
    
            $msg = "Tutor assigned";
            header("location: ../../users/admin/assigningTutors.php");
        }
        else {
            echo" an error has occured";
        }
    }
    else {
        echo" The name of the tutor you have input was either spelt incorrectly or does not exist";
    }
}
else {
    echo"The name of the tutor you have input was either spelt incorrectly or does not exist";
}
?>