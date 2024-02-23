<?php

require_once '../../db/dbconnection.php';
session_start();
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

// Define an associative array mapping tables to their respective email and password columns, optional role columns, and their unique ID columns
$tableColumnMapping = [
    'learner' => [
        'emailColumn' => 'LearnerEmail',
        'passwordColumn' => 'LearnerPassword',
        'idColumn' => 'UniqueLearnerNumber' 
    ],
    'tutor' => [
        'emailColumn' => 'TutorEmail',
        'passwordColumn' => 'TutorPassword',
        'roleColumn' => 'Role', // Tutor table contains both tutor and admin roles
        'idColumn' => 'TutorID' // TutorID for tutors and admins
    ],
    'employer' => [
        'emailColumn' => 'EmployerEmail',
        'passwordColumn' => 'EmployerPassword',
        'idColumn' => 'EmployerID' // EmployerID for employers
    ]
];

$loginSuccessful = false;
$userRole = '';
$userId = '';

foreach ($tableColumnMapping as $table => $columns) {
    
    $query = "SELECT * FROM {$table} WHERE {$columns['emailColumn']} = ? AND {$columns['passwordColumn']} = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        
        $stmt->bind_param('ss', $userEmail, $userPassword); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $loginSuccessful = true;
            $fetch = $result->fetch_object();

            
            $userId = $fetch->{$columns['idColumn']};

            // If the table has a 'roleColumn', use it to determine the user's role
            if (isset($columns['roleColumn'])) {
                $userRole = $fetch->{$columns['roleColumn']}; // Use the role attribute to set the user role
            } else {
                $userRole = $table; // For tables without a role column, use the table name as the role
            }

            $_SESSION['userID'] = $userId;

            $queryFetch = "SELECT * FROM {$table} WHERE {$columns['emailColumn']} = '$userEmail' AND {$columns['passwordColumn']} = '$userPassword'";
            $resultFetch = $mysqli->query($queryFetch);
            $fetchActive = $resultFetch->fetch_object();
            $activeStatus = $fetchActive->Active;
            if ($activeStatus == "Active"){
                $loginSuccessful = true;
            }
            else if ($activeStatus == "Inactive"){
                $loginSuccessful = false;
            }

        $stmt->close();
            break;
        }

        
    } else {
        echo "Error preparing statement for $table: " . $mysqli->error;
    }
}

if ($loginSuccessful) {
    // Redirect based on the user role
    switch ($userRole) {
        case 'learner':
            $_SESSION['userRole'] = "learner";
            header('location:http://localhost/GroupTrainingAssociation/users/learner/learner.php');
            break;
        case 'employer':
            $_SESSION['userRole'] = "employer";
            header('location:http://localhost/GroupTrainingAssociation/users/employer/employer.php');
            break;
        case 'Tutor':
            $_SESSION['userRole'] = "tutor";
            header('location:http://localhost/GroupTrainingAssociation/users/tutor/tutor.php');
            break;
        case 'Admin':
            $_SESSION['userRole'] = "admin";
            header('location:http://localhost/GroupTrainingAssociation/users/admin/admin.php');
            break;
        default:
            // Handle unexpected roles or add additional case statements for other roles if necessary
            echo "Unexpected user role.";
            break;
    }
} else {
    echo "Login failed.";
}

?>



