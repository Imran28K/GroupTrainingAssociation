<?php

require_once '../../db/dbconnection.php';

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
            break;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for $table: " . $mysqli->error;
    }
}

if ($loginSuccessful) {
    echo "Login successful. User role: $userRole.";
    // once success it will let u know the role of the user
} else {
    echo "Login failed.";
    
}

?>



i will do login query - imran nikhil