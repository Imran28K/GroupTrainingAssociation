<?php

//this is just testing
require_once("dbconnection.php");

$queryTest = "UPDATE learner SET learnerFirstName = 'Imran' WHERE UniqueLearnerNumber = '1000000000-DFY3'";
$resultTest = $mysqli->query($queryTest);

?>