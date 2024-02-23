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

            // Use the correct ID column based on the table
            $userId = $fetch->{$columns['idColumn']};

            // If the table has a 'roleColumn', use it to determine the user's role
            if (isset($columns['roleColumn'])) {
                $userRole = $fetch->{$columns['roleColumn']}; // Use the role attribute to set the user role
            } else {
                $userRole = $table; // For tables without a role column, use the table name as the role
            }

            $activeStatus = $fetch->Active;
            if ($activeStatus == "Active"){
                $loginSuccessful = true;
            }
            else if ($activeStatus == "Inactive"){
                $loginSuccessful = false;
            }

            $_SESSION['userID'] = $userID;

            $queryCheck = "SELECT * FROM tutor WHERE Role = 'Admin'";
            $resultCheck = $mysqli->query($queryCheck);

            if ($resultCheck->num_rows != 0){
                $userRole = "admin";
            }
            $_SESSION['userRole'] = $userRole;
            break;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for $table: " . $mysqli->error;
    }
}

if ($loginSuccessful) {
    // Redirect based on the user role
    switch ($userRole) {
        case 'learner':
            header('location:http://localhost/GroupTrainingAssociation/users/learner/learner.php');
            break;
        case 'employer':
            header('location:http://localhost/GroupTrainingAssociation/users/employer/employer.php');
            break;
        case 'Tutor':
            header('location:http://localhost/GroupTrainingAssociation/users/tutor/tutor.php');
            break;
        case 'Admin':
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


