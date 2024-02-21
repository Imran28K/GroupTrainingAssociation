<?php
//database connection to show actual results of learner progress
//i will do the code in this file - Imran
require_once '../db/dbconnection.php';

//learner table - Apprenticeship and cohort
//specificapprenticeship table - year and unit
//learningprogress table - ProgressRAG, startdate, expectedfinishdate, currentposition
//units table - modulenumber and submissiondate
// The UniqueLearnerNumber you're searching for
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}


$uniqueLearnerNumber = '1000000000-DFY3';

$sql = "SELECT ApprenticeshipName, Cohort FROM learner WHERE UniqueLearnerNumber = ?";


$stmt = mysqli_prepare($mysqli, $sql);


mysqli_stmt_bind_param($stmt, "s", $uniqueLearnerNumber);


mysqli_stmt_execute($stmt);


mysqli_stmt_bind_result($stmt, $ApprenticeshipName, $Cohort);

//this is temporary, i will implement this straight to the learner.php in the learner's progress section - imran

if (mysqli_stmt_fetch($stmt)) {
    echo "ApprenticeshipName: " . $ApprenticeshipName . " - Cohort: " . $Cohort . "<br>";
} else {
    echo "0 results";
}


mysqli_stmt_close($stmt);


mysqli_close($mysqli);

?>
