
<?php
require_once '../../db/dbconnection.php';
$userEmail = $_POST['email'];

// Define an associative array mapping tables to their email columns
$tableColumnMapping = [
    'learner' => 'LearnerEmail',
    'tutor' => 'TutorEmail',
    'employer' => 'EmployerEmail'
];

$emailFound = false;
$tableFound = '';

foreach ($tableColumnMapping as $table => $emailColumn) {
    
    $query = "SELECT * FROM {$table} WHERE {$emailColumn} = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        // Bind the user email to the query and execute
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            
            $emailFound = true;
            $tableFound = $table;
            break; 
        }

        $stmt->close();
    } else {
        echo "Error preparing statement for table $table: " . $mysqli->error;
    }
}

if ($emailFound) {
    echo "Email found in table: $tableFound";

} else {
    echo "Email not found in any table.";
    
}


?>


<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    echo $email . "<br>";
}
*/
?>

