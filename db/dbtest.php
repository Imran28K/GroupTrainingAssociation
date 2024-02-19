<?php
    require_once("dbconnection.php");
    $queryTest = "UPDATE learner SET learnerFirstName = 'Joseph' WHERE UniqueLearnerNumber = '1000000000-DFY3'";
    $resultTest = $mysqli->query($queryTest);
?>