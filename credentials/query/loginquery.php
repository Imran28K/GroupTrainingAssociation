<?php

require_once '../../db/dbconnection.php';
session_start();
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

// Define an associative array mapping tables to their respective email and password columns
$tableColumnMapping = [
    'learner' => ['emailColumn' => 'LearnerEmail', 'passwordColumn' => 'LearnerPassword'],
    'tutor' => ['emailColumn' => 'TutorEmail', 'passwordColumn' => 'TutorPassword'],
    'employer' => ['emailColumn' => 'EmployerEmail', 'passwordColumn' => 'EmployerPassword']
];

$loginSuccessful = false;
$userRole = '';

foreach ($tableColumnMapping as $table => $columns) {
    
    $queryTest = "SELECT * FROM {$table} WHERE {$columns['emailColumn']} = ? AND {$columns['passwordColumn']} = ?";
    $stmt = $mysqli->prepare($queryTest);

    if ($stmt) {
        
        $stmt->bind_param('ss', $userEmail, $userPassword); 

        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            
            $loginSuccessful = true;
            $userRole = $table; // Keep track of which table (role) the user was found in

            $queryFetch = "SELECT * FROM {$table} WHERE {$columns['emailColumn']} = '$userEmail' AND {$columns['passwordColumn']} = '$userPassword'";
            $resultFetch = $mysqli->query($queryFetch);
            $fetch = $resultFetch->fetch_object();
            if($userRole == "learner") {
                $userID = $fetch->UniqueLearnerNumber;
            } 
            elseif($userRole == "employer") {
                $userID = $fetch->EmployerID;
            } 
            elseif($userRole == "tutor") {
                $userID = $fetch->TutorID;
            } 
            
            else {
                $userID = $fetch->TutorID;
            }
            $_SESSION['userID'] = $userID;
            break;
 
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for $table: " . $mysqli->error;
    }
}

if ($loginSuccessful) {
    //echo "Login succssful. User role: $userRole.";
    if($userRole == "learner") {
        header('location:http://localhost/GroupTrainingAssociation/users/learner/learner.php');
    } 
    elseif($userRole == "employer") {
        header('location:http://localhost/GroupTrainingAssociation/users/employer/employer.php');
    } 
    elseif($userRole == "tutor") {
        header('location:http://localhost/GroupTrainingAssociation/users/tutor/tutor.php');
    } 
    
    else {
        header('location:http://localhost/GroupTrainingAssociation/users/admin/admin.php');
    }
      
 
    // once success it will let u know the role of the user
} else {
    echo "Login failed.";
    
}

?>