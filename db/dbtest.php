<?php
<<<<<<< HEAD
    require_once("dbconnection.php");
    $queryTest = "UPDATE learner SET learnerFirstName = 'Joseph' WHERE UniqueLearnerNumber = '1000000000-DFY3'";
    $resultTest = $mysqli->query($queryTest);
=======

//this is just testing
require_once("dbconnection.php");

$queryTest = "UPDATE learner SET learnerFirstName = 'Imran' WHERE UniqueLearnerNumber = '1000000000-DFY3'";
$resultTest = $mysqli->query($queryTest);

>>>>>>> 3e662e67720b5af1631b5e08d602ca215e449969
?>