<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor -> fetch_object();
    $learnerID = $_POST['learnerID'];
    $apprenticeshipName = $_POST['ApprenticeshipName']; $numberOfYears = $_POST['NumberOfYears'];
    $group1Name = $_POST['Group1'];  $group1SubmissionDate = $_POST['Group1Date'];
    $group2Name = $_POST['Group2'];  $group2SubmissionDate = $_POST['Group2Date'];
    $group3Name = $_POST['Group3'];  $group3SubmissionDate = $_POST['Group3Date'];
    $group4Name = $_POST['Group4'];  $group4SubmissionDate = $_POST['Group4Date'];
    $group5Name = $_POST['Group5'];  $group5SubmissionDate = $_POST['Group5Date'];
    $group6Name = $_POST['Group6'];  $group6SubmissionDate = $_POST['Group6Date'];
    $group7Name = $_POST['Group7'];  $group7SubmissionDate = $_POST['Group7Date'];
    $group8Name = $_POST['Group8'];  $group8SubmissionDate = $_POST['Group8Date'];
    $group9Name = $_POST['Group9'];  $group9SubmissionDate = $_POST['Group9Date'];
    $group10Name = $_POST['Group10'];  $group10SubmissionDate = $_POST['Group10Date'];
    $group11Name = $_POST['Group11'];  $group11SubmissionDate = $_POST['Group11Date'];
    $group12Name = $_POST['Group12'];  $group12SubmissionDate = $_POST['Group12Date'];
    $group13Name = $_POST['Group13'];  $group13SubmissionDate = $_POST['Group13Date'];
    $group14Name = $_POST['Group14'];  $group14SubmissionDate = $_POST['Group14Date'];
    $group15Name = $_POST['Group15'];  $group15SubmissionDate = $_POST['Group15Date'];
    $group16Name = $_POST['Group16'];  $group16SubmissionDate = $_POST['Group16Date'];
    $group17Name = $_POST['Group17'];  $group17SubmissionDate = $_POST['Group17Date'];
    $group18Name = $_POST['Group18'];  $group18SubmissionDate = $_POST['Group18Date'];
    $group19Name = $_POST['Group19'];  $group19SubmissionDate = $_POST['Group19Date'];
    $group20Name = $_POST['Group20'];  $group20SubmissionDate = $_POST['Group20Date'];
    $group21Name = $_POST['Group21'];  $group21SubmissionDate = $_POST['Group21Date'];
    $group22Name = $_POST['Group22'];  $group22SubmissionDate = $_POST['Group22Date'];
    $group23Name = $_POST['Group23'];  $group23SubmissionDate = $_POST['Group23Date'];
    $group24Name = $_POST['Group24'];  $group24SubmissionDate = $_POST['Group24Date'];
    $group25Name = $_POST['Group25'];  $group25SubmissionDate = $_POST['Group25Date'];
    $group26Name = $_POST['Group26'];  $group26SubmissionDate = $_POST['Group26Date'];
    $group27Name = $_POST['Group27'];  $group27SubmissionDate = $_POST['Group27Date'];
    $group28Name = $_POST['Group28'];  $group28SubmissionDate = $_POST['Group28Date'];
    $group29Name = $_POST['Group29'];  $group29SubmissionDate = $_POST['Group29Date'];
    $group30Name = $_POST['Group30'];  $group30SubmissionDate = $_POST['Group30Date'];
    $group31Name = $_POST['Group31'];  $group31SubmissionDate = $_POST['Group31Date'];
    $group32Name = $_POST['Group32'];  $group32SubmissionDate = $_POST['Group32Date'];
    $group33Name = $_POST['Group33'];  $group33SubmissionDate = $_POST['Group33Date'];
    $group34Name = $_POST['Group34'];  $group34SubmissionDate = $_POST['Group34Date'];

    //Group 1
    $queryCheckUnit1 = "SELECT * FROM Units WHERE UnitName = '$group1Name' AND SubmissionDate = '$group1SubmissionDate'"; 
    $resultCheckUnit1 = $mysqli->query($queryCheckUnit1); 
    $getUnit1 = $resultCheckUnit1 -> fetch_object();
    $getCheckUnit1 = $resultCheckUnit1 -> num_rows;
    if ($getCheckUnit1 > 0){
        $group1 = $getUnit1 -> UnitID;
    }
    else if ($getCheckUnit1 <= 0){
        $queryCreateUnit1 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group1Name', '$group1SubmissionDate')";
        $resultAssignTutor1 = $mysqli->query($queryCreateUnit1);
        $queryGetUnit1 = "SELECT * FROM units WHERE UnitName = '$group1Name' AND SubmissionDate = '$group1SubmissionDate'";
        $resultGetUnit1 = $mysqli->query($queryGetUnit1);
        $unit1 = $resultGetUnit1 -> fetch_object();
        $group1 = $unit1 -> UnitID;
    }

    //Group 2
    $queryCheckUnit2 = "SELECT * FROM Units WHERE UnitName = '$group2Name' AND SubmissionDate = '$group2SubmissionDate'"; 
    $resultCheckUnit2 = $mysqli->query($queryCheckUnit2); 
    $getUnit2 = $resultCheckUnit2 -> fetch_object();
    $getCheckUnit2 = $resultCheckUnit2 -> num_rows;
    if ($getCheckUnit2 > 0){
        $group2 = $getUnit2 -> UnitID;
    }
    else if ($getCheckUnit2 <= 0){
        $queryCreateUnit2 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group2Name', '$group2SubmissionDate')";
        $resultAssignTutor2 = $mysqli->query($queryCreateUnit2);
        $queryGetUnit2 = "SELECT * FROM units WHERE UnitName = '$group2Name' AND SubmissionDate = '$group2SubmissionDate'";
        $resultGetUnit2 = $mysqli->query($queryGetUnit2);
        $unit2 = $resultGetUnit2 -> fetch_object();
        $group2 = $unit2 -> UnitID;
    }

    //Group 3
    $queryCheckUnit3 = "SELECT * FROM Units WHERE UnitName = '$group3Name' AND SubmissionDate = '$group3SubmissionDate'"; 
    $resultCheckUnit3 = $mysqli->query($queryCheckUnit3); 
    $getUnit3 = $resultCheckUnit3 -> fetch_object();
    $getCheckUnit3 = $resultCheckUnit3 -> num_rows;
    if ($getCheckUnit3 > 0){
        $group3 = $getUnit3 -> UnitID;
    }
    else if ($getCheckUnit3 <= 0){
        $queryCreateUnit3 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group3Name', '$group3SubmissionDate')";
        $resultAssignTutor3 = $mysqli->query($queryCreateUnit3);
        $queryGetUnit3 = "SELECT * FROM units WHERE UnitName = '$group3Name' AND SubmissionDate = '$group3SubmissionDate'";
        $resultGetUnit3 = $mysqli->query($queryGetUnit3);
        $unit3 = $resultGetUnit3 -> fetch_object();
        $group3 = $unit3 -> UnitID;
    }

    //Group 4
    $queryCheckUnit4 = "SELECT * FROM Units WHERE UnitName = '$group4Name' AND SubmissionDate = '$group4SubmissionDate'"; 
    $resultCheckUnit4 = $mysqli->query($queryCheckUnit4); 
    $getUnit4 = $resultCheckUnit4 -> fetch_object();
    $getCheckUnit4 = $resultCheckUnit4 -> num_rows;
    if ($getCheckUnit4 > 0){
        $group4 = $getUnit4 -> UnitID;
    }
    else if ($getCheckUnit4 <= 0){
        $queryCreateUnit4 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group4Name', '$group4SubmissionDate')";
        $resultAssignTutor4 = $mysqli->query($queryCreateUnit4);
        $queryGetUnit4 = "SELECT * FROM units WHERE UnitName = '$group4Name' AND SubmissionDate = '$group4SubmissionDate'";
        $resultGetUnit4 = $mysqli->query($queryGetUnit4);
        $unit4 = $resultGetUnit4 -> fetch_object();
        $group4 = $unit4 -> UnitID;
    }

    //Group 5
    $queryCheckUnit5 = "SELECT * FROM Units WHERE UnitName = '$group5Name' AND SubmissionDate = '$group5SubmissionDate'"; 
    $resultCheckUnit5 = $mysqli->query($queryCheckUnit5); 
    $getUnit5 = $resultCheckUnit5 -> fetch_object();
    $getCheckUnit5 = $resultCheckUnit5 -> num_rows;
    if ($getCheckUnit5 > 0){
        $group5 = $getUnit5 -> UnitID;
    }
    else if ($getCheckUnit5 <= 0){
        $queryCreateUnit5 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group5Name', '$group5SubmissionDate')";
        $resultAssignTutor5 = $mysqli->query($queryCreateUnit5);
        $queryGetUnit5 = "SELECT * FROM units WHERE UnitName = '$group5Name' AND SubmissionDate = '$group5SubmissionDate'";
        $resultGetUnit5 = $mysqli->query($queryGetUnit5);
        $unit5 = $resultGetUnit5 -> fetch_object();
        $group5 = $unit5 -> UnitID;
    }

    //Group 6
    $queryCheckUnit6 = "SELECT * FROM Units WHERE UnitName = '$group6Name' AND SubmissionDate = '$group6SubmissionDate'"; 
    $resultCheckUnit6 = $mysqli->query($queryCheckUnit6); 
    $getUnit6 = $resultCheckUnit6 -> fetch_object();
    $getCheckUnit6 = $resultCheckUnit6 -> num_rows;
    if ($getCheckUnit6 > 0){
        $group6 = $getUnit6 -> UnitID;
    }
    else if ($getCheckUnit6 <= 0){
        $queryCreateUnit6 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group6Name', '$group6SubmissionDate')";
        $resultAssignTutor6 = $mysqli->query($queryCreateUnit6);
        $queryGetUnit6 = "SELECT * FROM Units WHERE UnitName = '$group6Name' AND SubmissionDate = '$group6SubmissionDate'";
        $resultGetUnit6 = $mysqli->query($queryGetUnit6);
        $unit6 = $resultGetUnit6 -> fetch_object();
        $group6 = $unit6 -> UnitID;
    }

    //Group 7
    $queryCheckUnit7 = "SELECT * FROM Units WHERE UnitName = '$group7Name' AND SubmissionDate = '$group7SubmissionDate'"; 
    $resultCheckUnit7 = $mysqli->query($queryCheckUnit7); 
    $getUnit7 = $resultCheckUnit7 -> fetch_object();
    $getCheckUnit7 = $resultCheckUnit7 -> num_rows;
    if ($getCheckUnit7 > 0){
        $group7 = $getUnit7 -> UnitID;
    }
    else if ($getCheckUnit7 <= 0){
        $queryCreateUnit7 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group7Name', '$group7SubmissionDate')";
        $resultAssignTutor7 = $mysqli->query($queryCreateUnit7);
        $queryGetUnit7 = "SELECT * FROM Units WHERE UnitName = '$group7Name' AND SubmissionDate = '$group7SubmissionDate'";
        $resultGetUnit7 = $mysqli->query($queryGetUnit7);
        $unit7 = $resultGetUnit7 -> fetch_object();
        $group7 = $unit7 -> UnitID;
    }

    //Group 8
    $queryCheckUnit8 = "SELECT * FROM Units WHERE UnitName = '$group8Name' AND SubmissionDate = '$group8SubmissionDate'"; 
    $resultCheckUnit8 = $mysqli->query($queryCheckUnit8); 
    $getUnit8 = $resultCheckUnit8 -> fetch_object();
    $getCheckUnit8 = $resultCheckUnit8 -> num_rows;
    if ($getCheckUnit8 > 0){
        $group8 = $getUnit8 -> UnitID;
    }
    else if ($getCheckUnit8 <= 0){
        $queryCreateUnit8 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group8Name', '$group8SubmissionDate')";
        $resultAssignTutor8 = $mysqli->query($queryCreateUnit8);
        $queryGetUnit8 = "SELECT * FROM Units WHERE UnitName = '$group8Name' AND SubmissionDate = '$group8SubmissionDate'";
        $resultGetUnit8 = $mysqli->query($queryGetUnit8);
        $unit8 = $resultGetUnit8 -> fetch_object();
        $group8 = $unit8 -> UnitID;
    }

    //Group 9
    $queryCheckUnit9 = "SELECT * FROM Units WHERE UnitName = '$group9Name' AND SubmissionDate = '$group9SubmissionDate'"; 
    $resultCheckUnit9 = $mysqli->query($queryCheckUnit9); 
    $getUnit9 = $resultCheckUnit9 -> fetch_object();
    $getCheckUnit9 = $resultCheckUnit9 -> num_rows;
    if ($getCheckUnit9 > 0){
        $group9 = $getUnit9 -> UnitID;
    }
    else if ($getCheckUnit9 <= 0){
        $queryCreateUnit9 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group9Name', '$group9SubmissionDate')";
        $resultAssignTutor9 = $mysqli->query($queryCreateUnit9);
        $queryGetUnit9 = "SELECT * FROM Units WHERE UnitName = '$group9Name' AND SubmissionDate = '$group9SubmissionDate'";
        $resultGetUnit9 = $mysqli->query($queryGetUnit9);
        $unit9 = $resultGetUnit9 -> fetch_object();
        $group9 = $unit9 -> UnitID;
    }

    //Group 10
    $queryCheckUnit10 = "SELECT * FROM Units WHERE UnitName = '$group10Name' AND SubmissionDate = '$group10SubmissionDate'"; 
    $resultCheckUnit10 = $mysqli->query($queryCheckUnit10); 
    $getUnit10 = $resultCheckUnit10 -> fetch_object();
    $getCheckUnit10 = $resultCheckUnit10 -> num_rows;
    if ($getCheckUnit10 > 0){
        $group10 = $getUnit10 -> UnitID;
    }
    else if ($getCheckUnit10 <= 0){
        $queryCreateUnit10 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group10Name', '$group10SubmissionDate')";
        $resultAssignTutor10 = $mysqli->query($queryCreateUnit10);
        $queryGetUnit10 = "SELECT * FROM units WHERE UnitName = '$group10Name' AND SubmissionDate = '$group10SubmissionDate'";
        $resultGetUnit10 = $mysqli->query($queryGetUnit10);
        $unit10 = $resultGetUnit10 -> fetch_object();
        $group10 = $unit10 -> UnitID;
    }

    //Group 11
    $queryCheckUnit11 = "SELECT * FROM Units WHERE UnitName = '$group11Name' AND SubmissionDate = '$group11SubmissionDate'"; 
    $resultCheckUnit11 = $mysqli->query($queryCheckUnit11); 
    $getUnit11 = $resultCheckUnit11 -> fetch_object();
    $getCheckUnit11 = $resultCheckUnit11 -> num_rows;
    if ($getCheckUnit11 > 0){
        $group11 = $getUnit11 -> UnitID;
    }
    else if ($getCheckUnit11 <= 0){
        $queryCreateUnit11 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group11Name', '$group11SubmissionDate')";
        $resultAssignTutor11 = $mysqli->query($queryCreateUnit11);
        $queryGetUnit11 = "SELECT * FROM units WHERE UnitName = '$group11Name' AND SubmissionDate = '$group11SubmissionDate'";
        $resultGetUnit11 = $mysqli->query($queryGetUnit11);
        $unit11 = $resultGetUnit11 -> fetch_object();
        $group11 = $unit11 -> UnitID;
    }

    //Group 12
    $queryCheckUnit12 = "SELECT * FROM Units WHERE UnitName = '$group12Name' AND SubmissionDate = '$group12SubmissionDate'"; 
    $resultCheckUnit12 = $mysqli->query($queryCheckUnit12); 
    $getUnit12 = $resultCheckUnit12 -> fetch_object();
    $getCheckUnit12 = $resultCheckUnit12 -> num_rows;
    if ($getCheckUnit12 > 0){
        $group12 = $getUnit12 -> UnitID;
    }
    else if ($getCheckUnit12 <= 0){
        $queryCreateUnit12 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group12Name', '$group12SubmissionDate')";
        $resultAssignTutor12 = $mysqli->query($queryCreateUnit12);
        $queryGetUnit12 = "SELECT * FROM units WHERE UnitName = '$group12Name' AND SubmissionDate = '$group12SubmissionDate'";
        $resultGetUnit12 = $mysqli->query($queryGetUnit12);
        $unit12 = $resultGetUnit12 -> fetch_object();
        $group12 = $unit12 -> UnitID;
    }

    //Group 13
    $queryCheckUnit13 = "SELECT * FROM Units WHERE UnitName = '$group13Name' AND SubmissionDate = '$group13SubmissionDate'"; 
    $resultCheckUnit13 = $mysqli->query($queryCheckUnit13); 
    $getUnit13 = $resultCheckUnit13 -> fetch_object();
    $getCheckUnit13 = $resultCheckUnit13 -> num_rows;
    if ($getCheckUnit13 > 0){
        $group13 = $getUnit13 -> UnitID;
    }
    else if ($getCheckUnit13 <= 0){
        $queryCreateUnit13 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group13Name', '$group13SubmissionDate')";
        $resultAssignTutor1 = $mysqli->query($queryCreateUnit13);
        $queryGetUnit13 = "SELECT * FROM units WHERE UnitName = '$group13Name' AND SubmissionDate = '$group13SubmissionDate'";
        $resultGetUnit13 = $mysqli->query($queryGetUnit13);
        $unit13 = $resultGetUnit13 -> fetch_object();
        $group13 = $unit13 -> UnitID;
    }

    //Group 14
    $queryCheckUnit14 = "SELECT * FROM Units WHERE UnitName = '$group14Name' AND SubmissionDate = '$group14SubmissionDate'"; 
    $resultCheckUnit14 = $mysqli->query($queryCheckUnit14); 
    $getUnit14 = $resultCheckUnit14 -> fetch_object();
    $getCheckUnit14 = $resultCheckUnit14 -> num_rows;
    if ($getCheckUnit14 > 0){
        $group14 = $getUnit14 -> UnitID;
    }
    else if ($getCheckUnit14 <= 0){
        $queryCreateUnit14 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group14Name', '$group14SubmissionDate')";
        $resultAssignTutor14 = $mysqli->query($queryCreateUnit14);
        $queryGetUnit14 = "SELECT * FROM units WHERE UnitName = '$group14Name' AND SubmissionDate = '$group14SubmissionDate'";
        $resultGetUnit14 = $mysqli->query($queryGetUnit14);
        $unit14 = $resultGetUnit14 -> fetch_object();
        $group14 = $unit14 -> UnitID;
    }

    //Group 15
    $queryCheckUnit15 = "SELECT * FROM Units WHERE UnitName = '$group15Name' AND SubmissionDate = '$group15SubmissionDate'"; 
    $resultCheckUnit15 = $mysqli->query($queryCheckUnit15); 
    $getUnit15 = $resultCheckUnit15 -> fetch_object();
    $getCheckUnit15 = $resultCheckUnit15 -> num_rows;
    if ($getCheckUnit15 > 0){
        $group15 = $getUnit15 -> UnitID;
    }
    else if ($getCheckUnit15 <= 0){
        $queryCreateUnit15 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group15Name', '$group15SubmissionDate')";
        $resultAssignTutor15 = $mysqli->query($queryCreateUnit15);
        $queryGetUnit15 = "SELECT * FROM units WHERE UnitName = '$group15Name' AND SubmissionDate = '$group15SubmissionDate'";
        $resultGetUnit15 = $mysqli->query($queryGetUnit15);
        $unit15 = $resultGetUnit15 -> fetch_object();
        $group15 = $unit15 -> UnitID;
    }

    //Group 16
    $queryCheckUnit16 = "SELECT * FROM Units WHERE UnitName = '$group16Name' AND SubmissionDate = '$group16SubmissionDate'"; 
    $resultCheckUnit16 = $mysqli->query($queryCheckUnit16); 
    $getUnit16 = $resultCheckUnit16 -> fetch_object();
    $getCheckUnit16 = $resultCheckUnit16 -> num_rows;
    if ($getCheckUnit16 > 0){
        $group16 = $getUnit16 -> UnitID;
    }
    else if ($getCheckUnit16 <= 0){
        $queryCreateUnit16 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group16Name', '$group16SubmissionDate')";
        $resultAssignTutor16 = $mysqli->query($queryCreateUnit16);
        $queryGetUnit16 = "SELECT * FROM units WHERE UnitName = '$group16Name' AND SubmissionDate = '$group16SubmissionDate'";
        $resultGetUnit16 = $mysqli->query($queryGetUnit16);
        $unit16 = $resultGetUnit16 -> fetch_object();
        $group16 = $unit16 -> UnitID;
    }

    //Group 17
    $queryCheckUnit17 = "SELECT * FROM Units WHERE UnitName = '$group17Name' AND SubmissionDate = '$group17SubmissionDate'"; 
    $resultCheckUnit17 = $mysqli->query($queryCheckUnit17); 
    $getUnit17 = $resultCheckUnit17 -> fetch_object();
    $getCheckUnit17 = $resultCheckUnit17 -> num_rows;
    if ($getCheckUnit17 > 0){
        $group17 = $getUnit17 -> UnitID;
    }
    else if ($getCheckUnit17 <= 0){
        $queryCreateUnit17 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group17Name', '$group17SubmissionDate')";
        $resultAssignTutor17 = $mysqli->query($queryCreateUnit17);
        $queryGetUnit17 = "SELECT * FROM units WHERE UnitName = '$group17Name' AND SubmissionDate = '$group17SubmissionDate'";
        $resultGetUnit17 = $mysqli->query($queryGetUnit17);
        $unit17 = $resultGetUnit17 -> fetch_object();
        $group17 = $unit17 -> UnitID;
    }

    //Group 18
    $queryCheckUnit18 = "SELECT * FROM Units WHERE UnitName = '$group18Name' AND SubmissionDate = '$group18SubmissionDate'"; 
    $resultCheckUnit18 = $mysqli->query($queryCheckUnit18); 
    $getUnit18 = $resultCheckUnit18 -> fetch_object();
    $getCheckUnit18 = $resultCheckUnit18 -> num_rows;
    if ($getCheckUnit18 > 0){
        $group18 = $getUnit18 -> UnitID;
    }
    else if ($getCheckUnit18 <= 0){
        $queryCreateUnit18 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group18Name', '$group18SubmissionDate')";
        $resultAssignTutor18 = $mysqli->query($queryCreateUnit18);
        $queryGetUnit18 = "SELECT * FROM units WHERE UnitName = '$group18Name' AND SubmissionDate = '$group18SubmissionDate'";
        $resultGetUnit18 = $mysqli->query($queryGetUnit18);
        $unit18 = $resultGetUnit18 -> fetch_object();
        $group18 = $unit18 -> UnitID;
    }

    //Group 19
    $queryCheckUnit19 = "SELECT * FROM Units WHERE UnitName = '$group19Name' AND SubmissionDate = '$group19SubmissionDate'"; 
    $resultCheckUnit19 = $mysqli->query($queryCheckUnit19); 
    $getUnit19 = $resultCheckUnit19 -> fetch_object();
    $getCheckUnit19 = $resultCheckUnit19 -> num_rows;
    if ($getCheckUnit19 > 0){
        $group19 = $getUnit19 -> UnitID;
    }
    else if ($getCheckUnit19 <= 0){
        $queryCreateUnit19 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group19Name', '$group19SubmissionDate')";
        $resultAssignTutor19 = $mysqli->query($queryCreateUnit19);
        $queryGetUnit19 = "SELECT * FROM units WHERE UnitName = '$group19Name' AND SubmissionDate = '$group19SubmissionDate'";
        $resultGetUnit19 = $mysqli->query($queryGetUnit19);
        $unit19 = $resultGetUnit19 -> fetch_object();
        $group19 = $unit19 -> UnitID;
    }

    //Group 20
    $queryCheckUnit20 = "SELECT * FROM Units WHERE UnitName = '$group20Name' AND SubmissionDate = '$group20SubmissionDate'"; 
    $resultCheckUnit20 = $mysqli->query($queryCheckUnit20); 
    $getUnit20 = $resultCheckUnit20 -> fetch_object();
    $getCheckUnit20 = $resultCheckUnit20 -> num_rows;
    if ($getCheckUnit20 > 0){
        $group20 = $getUnit20 -> UnitID;
    }
    else if ($getCheckUnit20 <= 0){
        $queryCreateUnit20 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group20Name', '$group20SubmissionDate')";
        $resultAssignTutor20 = $mysqli->query($queryCreateUnit20);
        $queryGetUnit20 = "SELECT * FROM Units WHERE UnitName = '$group20Name' AND SubmissionDate = '$group20SubmissionDate'";
        $resultGetUnit20 = $mysqli->query($queryGetUnit20);
        $unit20 = $resultGetUnit20 -> fetch_object();
        $group20 = $unit20 -> UnitID;
    }

    //Group 21
    $queryCheckUnit21 = "SELECT * FROM Units WHERE UnitName = '$group21Name' AND SubmissionDate = '$group21SubmissionDate'"; 
    $resultCheckUnit21 = $mysqli->query($queryCheckUnit21); 
    $getUnit21 = $resultCheckUnit21 -> fetch_object();
    $getCheckUnit21 = $resultCheckUnit21 -> num_rows;
    if ($getCheckUnit21 > 0){
        $group21 = $getUnit21 -> UnitID;
    }
    else if ($getCheckUnit21 <= 0){
        $queryCreateUnit21 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group21Name', '$group21SubmissionDate')";
        $resultAssignTutor21 = $mysqli->query($queryCreateUnit21);
        $queryGetUnit21 = "SELECT * FROM Units WHERE UnitName = '$group21Name' AND SubmissionDate = '$group21SubmissionDate'";
        $resultGetUnit21 = $mysqli->query($queryGetUnit21);
        $unit21 = $resultGetUnit21 -> fetch_object();
        $group21 = $unit21 -> UnitID;
    }

    //Group 22
    $queryCheckUnit22 = "SELECT * FROM Units WHERE UnitName = '$group22Name' AND SubmissionDate = '$group22SubmissionDate'"; 
    $resultCheckUnit22 = $mysqli->query($queryCheckUnit22); 
    $getUnit22 = $resultCheckUnit22 -> fetch_object();
    $getCheckUnit22 = $resultCheckUnit22 -> num_rows;
    if ($getCheckUnit22 > 0){
        $group22 = $getUnit22 -> UnitID;
    }
    else if ($getCheckUnit22 <= 0){
        $queryCreateUnit22 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group22Name', '$group22SubmissionDate')";
        $resultAssignTutor22 = $mysqli->query($queryCreateUnit22);
        $queryGetUnit22 = "SELECT * FROM Units WHERE UnitName = '$group22Name' AND SubmissionDate = '$group22SubmissionDate'";
        $resultGetUnit22 = $mysqli->query($queryGetUnit22);
        $unit22 = $resultGetUnit22 -> fetch_object();
        $group22 = $unit22 -> UnitID;
    }

    //Group 23
    $queryCheckUnit23 = "SELECT * FROM Units WHERE UnitName = '$group23Name' AND SubmissionDate = '$group23SubmissionDate'"; 
    $resultCheckUnit23 = $mysqli->query($queryCheckUnit23); 
    $getUnit23 = $resultCheckUnit23 -> fetch_object();
    $getCheckUnit23 = $resultCheckUnit23 -> num_rows;
    if ($getCheckUnit23 > 0){
        $group23 = $getUnit23 -> UnitID;
    }
    else if ($getCheckUnit23 <= 0){
        $queryCreateUnit23 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group23Name', '$group23SubmissionDate')";
        $resultAssignTutor23 = $mysqli->query($queryCreateUnit23);
        $queryGetUnit23 = "SELECT * FROM Units WHERE UnitName = '$group23Name' AND SubmissionDate = '$group23SubmissionDate'";
        $resultGetUnit23 = $mysqli->query($queryGetUnit23);
        $unit23 = $resultGetUnit23 -> fetch_object();
        $group23 = $unit23 -> UnitID;
    }

    //Group 24
    $queryCheckUnit24 = "SELECT * FROM Units WHERE UnitName = '$group24Name' AND SubmissionDate = '$group24SubmissionDate'"; 
    $resultCheckUnit24 = $mysqli->query($queryCheckUnit24); 
    $getUnit24 = $resultCheckUnit24 -> fetch_object();
    $getCheckUnit24 = $resultCheckUnit24 -> num_rows;
    if ($getCheckUnit24 > 0){
        $group24 = $getUnit24 -> UnitID;
    }
    else if ($getCheckUnit24 <= 0){
        $queryCreateUnit24 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group24Name', '$group24SubmissionDate')";
        $resultAssignTutor24 = $mysqli->query($queryCreateUnit24);
        $queryGetUnit24 = "SELECT * FROM Units WHERE UnitName = '$group24Name' AND SubmissionDate = '$group24SubmissionDate'";
        $resultGetUnit24 = $mysqli->query($queryGetUnit24);
        $unit24 = $resultGetUnit24 -> fetch_object();
        $group24 = $unit24 -> UnitID;
    }

    //Group 25
    $queryCheckUnit25 = "SELECT * FROM Units WHERE UnitName = '$group25Name' AND SubmissionDate = '$group25SubmissionDate'"; 
    $resultCheckUnit25 = $mysqli->query($queryCheckUnit25); 
    $getUnit25 = $resultCheckUnit25 -> fetch_object();
    $getCheckUnit25 = $resultCheckUnit25 -> num_rows;
    if ($getCheckUnit25 > 0){
        $group25 = $getUnit25 -> UnitID;
    }
    else if ($getCheckUnit25 <= 0){
        $queryCreateUnit25 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group25Name', '$group25SubmissionDate')";
        $resultAssignTutor25 = $mysqli->query($queryCreateUnit25);
        $queryGetUnit25 = "SELECT * FROM Units WHERE UnitName = '$group25Name' AND SubmissionDate = '$group25SubmissionDate'";
        $resultGetUnit25 = $mysqli->query($queryGetUnit25);
        $unit25 = $resultGetUnit25 -> fetch_object();
        $group25 = $unit25 -> UnitID;
    }

    //Group 26
    $queryCheckUnit26 = "SELECT * FROM Units WHERE UnitName = '$group26Name' AND SubmissionDate = '$group26SubmissionDate'"; 
    $resultCheckUnit26 = $mysqli->query($queryCheckUnit26); 
    $getUnit26 = $resultCheckUnit26 -> fetch_object();
    $getCheckUnit26 = $resultCheckUnit26 -> num_rows;
    if ($getCheckUnit26 > 0){
        $group26 = $getUnit26 -> UnitID;
    }
    else if ($getCheckUnit26 <= 0){
        $queryCreateUnit26 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group26Name', '$group26SubmissionDate')";
        $resultAssignTutor26 = $mysqli->query($queryCreateUnit26);
        $queryGetUnit26 = "SELECT * FROM Units WHERE UnitName = '$group26Name' AND SubmissionDate = '$group26SubmissionDate'";
        $resultGetUnit26 = $mysqli->query($queryGetUnit26);
        $unit26 = $resultGetUnit26 -> fetch_object();
        $group26 = $unit26 -> UnitID;
    }

    //Group 27
    $queryCheckUnit27 = "SELECT * FROM Units WHERE UnitName = '$group27Name' AND SubmissionDate = '$group27SubmissionDate'"; 
    $resultCheckUnit27 = $mysqli->query($queryCheckUnit27); 
    $getUnit27 = $resultCheckUnit27 -> fetch_object();
    $getCheckUnit27 = $resultCheckUnit27 -> num_rows;
    if ($getCheckUnit27 > 0){
        $group27 = $getUnit27 -> UnitID;
    }
    else if ($getCheckUnit27 <= 0){
        $queryCreateUnit27 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group27Name', '$group27SubmissionDate')";
        $resultAssignTutor27 = $mysqli->query($queryCreateUnit27);
        $queryGetUnit27 = "SELECT * FROM Units WHERE UnitName = '$group27Name' AND SubmissionDate = '$group27SubmissionDate'";
        $resultGetUnit27 = $mysqli->query($queryGetUnit27);
        $unit27 = $resultGetUnit27 -> fetch_object();
        $group27 = $unit27 -> UnitID;
    }

    //Group 28
    $queryCheckUnit28 = "SELECT * FROM Units WHERE UnitName = '$group28Name' AND SubmissionDate = '$group28SubmissionDate'"; 
    $resultCheckUnit28 = $mysqli->query($queryCheckUnit28); 
    $getUnit28 = $resultCheckUnit28 -> fetch_object();
    $getCheckUnit28 = $resultCheckUnit28 -> num_rows;
    if ($getCheckUnit28 > 0){
        $group28 = $getUnit28 -> UnitID;
    }
    else if ($getCheckUnit28 <= 0){
        $queryCreateUnit28 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group28Name', '$group28SubmissionDate')";
        $resultAssignTutor28 = $mysqli->query($queryCreateUnit28);
        $queryGetUnit28 = "SELECT * FROM Units WHERE UnitName = '$group28Name' AND SubmissionDate = '$group28SubmissionDate'";
        $resultGetUnit28 = $mysqli->query($queryGetUnit28);
        $unit28 = $resultGetUnit28 -> fetch_object();
        $group28 = $unit28 -> UnitID;
    }

    //Group 29
    $queryCheckUnit29 = "SELECT * FROM Units WHERE UnitName = '$group29Name' AND SubmissionDate = '$group29SubmissionDate'"; 
    $resultCheckUnit29 = $mysqli->query($queryCheckUnit29); 
    $getUnit29 = $resultCheckUnit29 -> fetch_object();
    $getCheckUnit29 = $resultCheckUnit29 -> num_rows;
    if ($getCheckUnit29 > 0){
        $group29 = $getUnit29 -> UnitID;
    }
    else if ($getCheckUnit29 <= 0){
        $queryCreateUnit29 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group29Name', '$group29SubmissionDate')";
        $resultAssignTutor29 = $mysqli->query($queryCreateUnit29);
        $queryGetUnit29 = "SELECT * FROM Units WHERE UnitName = '$group29Name' AND SubmissionDate = '$group29SubmissionDate'";
        $resultGetUnit29 = $mysqli->query($queryGetUnit29);
        $unit29 = $resultGetUnit29 -> fetch_object();
        $group29 = $unit29 -> UnitID;
    }

    //Group 30
    $queryCheckUnit30 = "SELECT * FROM Units WHERE UnitName = '$group30Name' AND SubmissionDate = '$group30SubmissionDate'"; 
    $resultCheckUnit30 = $mysqli->query($queryCheckUnit30); 
    $getUnit30 = $resultCheckUnit30 -> fetch_object();
    $getCheckUnit30 = $resultCheckUnit30 -> num_rows;
    if ($getCheckUnit30 > 0){
        $group30 = $getUnit30 -> UnitID;
    }
    else if ($getCheckUnit30 <= 0){
        $queryCreateUnit30 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group30Name', '$group30SubmissionDate')";
        $resultAssignTutor30 = $mysqli->query($queryCreateUnit30);
        $queryGetUnit30 = "SELECT * FROM Units WHERE UnitName = '$group30Name' AND SubmissionDate = '$group30SubmissionDate'";
        $resultGetUnit30 = $mysqli->query($queryGetUnit30);
        $unit30 = $resultGetUnit30 -> fetch_object();
        $group30 = $unit30 -> UnitID;
    }

    //Group 31
    $queryCheckUnit31 = "SELECT * FROM Units WHERE UnitName = '$group31Name' AND SubmissionDate = '$group31SubmissionDate'"; 
    $resultCheckUnit31 = $mysqli->query($queryCheckUnit31); 
    $getUnit31 = $resultCheckUnit31 -> fetch_object();
    $getCheckUnit31 = $resultCheckUnit31 -> num_rows;
    if ($getCheckUnit31 > 0){
        $group31 = $getUnit31 -> UnitID;
    }
    else if ($getCheckUnit31 <= 0){
        $queryCreateUnit31 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group31Name', '$group31SubmissionDate')";
        $resultAssignTutor31 = $mysqli->query($queryCreateUnit31);
        $queryGetUnit31 = "SELECT * FROM Units WHERE UnitName = '$group31Name' AND SubmissionDate = '$group31SubmissionDate'";
        $resultGetUnit31 = $mysqli->query($queryGetUnit31);
        $unit31 = $resultGetUnit31 -> fetch_object();
        $group31 = $unit31 -> UnitID;
    }

    //Group 32
    $queryCheckUnit32 = "SELECT * FROM Units WHERE UnitName = '$group32Name' AND SubmissionDate = '$group32SubmissionDate'"; 
    $resultCheckUnit32 = $mysqli->query($queryCheckUnit32); 
    $getUnit32 = $resultCheckUnit32 -> fetch_object();
    $getCheckUnit32 = $resultCheckUnit32 -> num_rows;
    if ($getCheckUnit32 > 0){
        $group32 = $getUnit32 -> UnitID;
    }
    else if ($getCheckUnit32 <= 0){
        $queryCreateUnit32 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group32Name', '$group32SubmissionDate')";
        $resultAssignTutor32 = $mysqli->query($queryCreateUnit32);
        $queryGetUnit32 = "SELECT * FROM Units WHERE UnitName = '$group32Name' AND SubmissionDate = '$group32SubmissionDate'";
        $resultGetUnit32 = $mysqli->query($queryGetUnit32);
        $unit32 = $resultGetUnit32 -> fetch_object();
        $group32 = $unit32 -> UnitID;
    }

     //Group 33
     $queryCheckUnit33 = "SELECT * FROM Units WHERE UnitName = '$group33Name' AND SubmissionDate = '$group33SubmissionDate'"; 
     $resultCheckUnit33 = $mysqli->query($queryCheckUnit33); 
     $getUnit33 = $resultCheckUnit33 -> fetch_object();
     $getCheckUnit33 = $resultCheckUnit33 -> num_rows;
     if ($getCheckUnit33 > 0){
         $group33 = $getUnit33 -> UnitID;
     }
     else if ($getCheckUnit33 <= 0){
         $queryCreateUnit33 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group33Name', '$group33SubmissionDate')";
         $resultAssignTutor33 = $mysqli->query($queryCreateUnit33);
         $queryGetUnit33 = "SELECT * FROM Units WHERE UnitName = '$group33Name' AND SubmissionDate = '$group33SubmissionDate'";
         $resultGetUnit33 = $mysqli->query($queryGetUnit33);
         $unit33 = $resultGetUnit33 -> fetch_object();
         $group33 = $unit33 -> UnitID;
     }

      //Group 34
    $queryCheckUnit34 = "SELECT * FROM Units WHERE UnitName = '$group34Name' AND SubmissionDate = '$group34SubmissionDate'"; 
    $resultCheckUnit34 = $mysqli->query($queryCheckUnit34); 
    $getUnit34 = $resultCheckUnit34 -> fetch_object();
    $getCheckUnit34 = $resultCheckUnit34 -> num_rows;
    if ($getCheckUnit34 > 0){
        $group34 = $getUnit34 -> UnitID;
    }
    else if ($getCheckUnit34 <= 0){
        $queryCreateUnit34 = "INSERT INTO units (UnitName, SubmissionDate) VALUES ('$group34Name', '$group34SubmissionDate')";
        $resultAssignTutor34 = $mysqli->query($queryCreateUnit34);
        $queryGetUnit34 = "SELECT * FROM Units WHERE UnitName = '$group34Name' AND SubmissionDate = '$group34SubmissionDate'";
        $resultGetUnit34 = $mysqli->query($queryGetUnit34);
        $unit34 = $resultGetUnit34 -> fetch_object();
        $group34 = $unit34 -> UnitID;
    }

    $queryCreateTemplate = "INSERT INTO apprenticeshiptemplates (apprenticeshipName, NumberOfYears, Group1, Group2, Group3, Group4, Group5, Group6, Group7, Group8, Group9, Group10, Group11, Group12, Group13, Group14, Group15, Group16, Group17, Group18, Group19, Group20, Group21, Group22, Group23, Group24, Group25, Group26, Group27, Group28, Group29, Group30, Group31, Group32, Group33, Group34) VALUES ('$apprenticeshipName', '$numberOfYears', '$group1', '$group2', '$group3', '$group4', '$group5', '$group6', '$group7', '$group8', '$group9', '$group10', '$group11', '$group12', '$group13', '$group14', '$group15', '$group16', '$group17', '$group18', '$group19', '$group20', '$group21', '$group22', '$group23', '$group24', '$group25', '$group26', '$group27', '$group28', '$group29', '$group30', '$group31', '$group32', '$group33', '$group34')";
    $resultCreateTemplate = $mysqli->query($queryCreateTemplate);

    $queryGetTemplates = "SELECT * FROM apprenticeshiptemplates WHERE apprenticeshipName = '$apprenticeshipName' AND NumberOfYears = '$numberOfYears' AND Group1 = '$group1' AND Group2 = '$group2' AND Group3 = '$group3' AND Group4 = '$group4' AND Group5 = '$group5' AND Group6 = '$group6' AND Group7 = '$group7' AND Group8 = '$group8' AND Group9 = '$group9' AND Group10 = '$group10' AND Group11  = '$group11' AND Group12  = '$group12' AND Group13  = '$group13' AND Group14  = '$group14' AND Group15  = '$group15' AND Group16  = '$group16' AND Group17  = '$group17' AND Group18  = '$group18' AND Group19  = '$group19' AND Group20  = '$group20' AND Group21  = '$group21' AND Group22  = '$group22' AND Group23  = '$group23' AND Group24  = '$group24' AND Group25  = '$group25' AND Group26  = '$group26' AND Group27  = '$group27' AND Group28  = '$group28' AND Group29  = '$group29' AND Group30  = '$group30' AND Group31  = '$group31' AND Group32  = '$group32' AND Group33  = '$group33' AND Group34  = '$group34'";
    $resultGetTemplates = $mysqli->query($queryGetTemplates);
    $getTemplateID = $resultGetTemplates -> fetch_object();
    $existsCheck = $resultGetTemplates -> num_rows;
    $templateID = $getTemplateID -> ApprenticeshipTemplateID;

    echo"Any rows? $existsCheck";

    $queryCreateTemplate = "UPDATE learner SET TemplateID = $templateID, ApprenticeshipName = '$apprenticeshipName' WHERE UniqueLearnerNumber = '$learnerID'";
    $resultCreateTemplate = $mysqli->query($queryCreateTemplate);

    $queryGetLearner = "SELECT * FROM learner WHERE UniqueLearnerNumber = '$learnerID'";
    $resultGetLearner = $mysqli->query($queryGetLearner);
    $getLearnerProgressID = $resultGetLearner -> fetch_object();
    $progressID = $getLearnerProgressID -> ProgressID;

    $queryClearProgress = "DELETE FROM progressunits WHERE ProgressID = '$progressID'";
    $resultClearProgress = $mysqli->query($queryClearProgress);

    if ($group1 == 1){
    } else {
        $queryGroup1Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group1', 'Uncompleted')";
    $resultGroup1Progress = $mysqli->query($queryGroup1Progress);
    }

    if ($group2 == 1){
    } else {
        $queryGroup2Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group2', 'Uncompleted')";
        $resultGroup2Progress = $mysqli->query($queryGroup2Progress);
    }

    if ($group3 == 1){
    } else {
        $queryGroup3Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group3', 'Uncompleted')";
        $resultGroup3Progress = $mysqli->query($queryGroup3Progress);
    }

    if ($group4 == 1){
    } else {
        $queryGroup4Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group4', 'Uncompleted')";
        $resultGroup4Progress = $mysqli->query($queryGroup4Progress);
    }

    if ($group5 == 1){
    } else {
        $queryGroup5Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group5', 'Uncompleted')";
        $resultGroup5Progress = $mysqli->query($queryGroup5Progress);
    }

    if ($group6 == 1){
    } else {
        $queryGroup6Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group6', 'Uncompleted')";
    $resultGroup6Progress = $mysqli->query($queryGroup6Progress);
    }
    
    if ($group7 == 1){
    } else {
        $queryGroup7Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group7', 'Uncompleted')";
    $resultGroup7Progress = $mysqli->query($queryGroup7Progress);
    }
    
    if ($group8 == 1){
    } else {
        $queryGroup8Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group8', 'Uncompleted')";
        $resultGroup8Progress = $mysqli->query($queryGroup8Progress);
    }
   
    if ($group9 == 1){
    } else {
        $queryGroup9Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group9', 'Uncompleted')";
        $resultGroup9Progress = $mysqli->query($queryGroup9Progress);
    }
    
    if ($group10 == 1){
    } else {
        $queryGroup10Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group10', 'Uncompleted')";
    $resultGroup10Progress = $mysqli->query($queryGroup10Progress);
    }
    
    if ($group11 == 1){
    } else {
        $queryGroup11Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group11', 'Uncompleted')";
    $resultGroup11Progress = $mysqli->query($queryGroup11Progress);
    }
    
    if ($group12 == 1){
    } else {
        $queryGroup12Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group12', 'Uncompleted')";
    $resultGroup12Progress = $mysqli->query($queryGroup12Progress);
    }

    if ($group13 == 1){
    } else {
        $queryGroup13Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group13', 'Uncompleted')";
    $resultGroup13Progress = $mysqli->query($queryGroup13Progress);
    }
    
    if ($group14 == 1){
    } else {
        $queryGroup14Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group14', 'Uncompleted')";
    $resultGroup14Progress = $mysqli->query($queryGroup14Progress);
    }

    if ($group15 == 1){
    } else {
        $queryGroup15Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group15', 'Uncompleted')";
        $resultGroup15Progress = $mysqli->query($queryGroup15Progress);
    }
    
    if ($group16 == 1){
    } else {
        $queryGroup16Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group16', 'Uncompleted')";
    $resultGroup16Progress = $mysqli->query($queryGroup16Progress);
    }

    if ($group17 == 1){
    } else {
        $queryGroup17Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group17', 'Uncompleted')";
    $resultGroup17Progress = $mysqli->query($queryGroup17Progress);
    }

    if ($group18 == 1){
    } else {
        $queryGroup18Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group18', 'Uncompleted')";
    $resultGroup18Progress = $mysqli->query($queryGroup18Progress);
    }

    if ($group19 == 1){
    } else {
        $queryGroup19Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group19', 'Uncompleted')";
    $resultGroup19Progress = $mysqli->query($queryGroup19Progress);
    }

    if ($group20 == 1){
    } else {
        $queryGroup20Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group20', 'Uncompleted')";
    $resultGroup20Progress = $mysqli->query($queryGroup20Progress);
    }

    if ($group21 == 1){
    } else {
        $queryGroup21Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group21', 'Uncompleted')";
    $resultGroup21Progress = $mysqli->query($queryGroup21Progress);
    }

    if ($group22 == 1){
    } else {
        $queryGroup22Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group22', 'Uncompleted')";
    $resultGroup22Progress = $mysqli->query($queryGroup22Progress);
    }

    if ($group23 == 1){
    } else {
        $queryGroup23Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group23', 'Uncompleted')";
        $resultGroup23Progress = $mysqli->query($queryGroup23Progress);
    }

    if ($group24 == 1){
    } else {
        $queryGroup24Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group24', 'Uncompleted')";
    $resultGroup24Progress = $mysqli->query($queryGroup24Progress);
    }

    if ($group25 == 1){
    } else {
        $queryGroup25Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group25', 'Uncompleted')";
    $resultGroup25Progress = $mysqli->query($queryGroup25Progress);
    }

    if ($group26 == 1){
    } else {
        $queryGroup26Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group26', 'Uncompleted')";
    $resultGroup26Progress = $mysqli->query($queryGroup26Progress);
    }

    if ($group27 == 1){
    } else {
        $queryGroup27Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group27', 'Uncompleted')";
    $resultGroup27Progress = $mysqli->query($queryGroup27Progress);
    }

    if ($group28 == 1){
    } else {
        $queryGroup28Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group28', 'Uncompleted')";
    $resultGroup28Progress = $mysqli->query($queryGroup28Progress);
    }

    if ($group29 == 1){
    } else {
        $queryGroup29Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group29', 'Uncompleted')";
    $resultGroup29Progress = $mysqli->query($queryGroup29Progress);
    }

    if ($group30 == 1){
    } else {
        $queryGroup30Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group30', 'Uncompleted')";
    $resultGroup30Progress = $mysqli->query($queryGroup30Progress);
    }

    if ($group31 == 1){
    } else {
        $queryGroup31Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group31', 'Uncompleted')";
    $resultGroup31Progress = $mysqli->query($queryGroup31Progress);
    }

    if ($group32 == 1){
    } else {
        $queryGroup32Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group32', 'Uncompleted')";
    $resultGroup32Progress = $mysqli->query($queryGroup32Progress);
    }

    if ($group33 == 1){
    } else {
        $queryGroup33Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group33', 'Uncompleted')";
    $resultGroup33Progress = $mysqli->query($queryGroup33Progress);
    }

    if ($group34 == 1){
    } else {
        $queryGroup34Progress = "INSERT INTO progressunits (ProgressID, UnitID, CurrentStatus) VALUES ('$progressID', '$group34', 'Uncompleted')";
    $resultGroup34Progress = $mysqli->query($queryGroup34Progress);
    }

    $msg = "Template updated";
    header("location: ../../users/admin/templateChoice.php");
?>