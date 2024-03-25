<?php
require_once '../../../db/dbconnection.php'; 
//note to others, everytime you test it make sure to delete the records that get added in the database
//in learningprogress and learner table
//it will still add stuff even if it comes out as an error.
//there will be a excel sheet file added into the uploads folder where importerPage.php is whenever you import
//so delete it everytime you test it so that it wont increase the file size i guess 
if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileTmpName = $_FILES['excel']['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['xls', 'xlsx']; 

    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = date("Y.m.d-H.i.sa") . "." . $fileExtension;
        $targetDirectory = "../uploads/" . $newFileName;

        if (move_uploaded_file($fileTmpName, $targetDirectory)) {
            require '../excelReader/excel_reader2.php'; 
            require '../excelReader/SpreadsheetReader.php'; 

            $reader = new SpreadsheetReader($targetDirectory);
            foreach ($reader as $key => $row) {
                // To Skip the first row (header)
                if ($key === 0) {
                    continue;
                }
                
                $UnitID = 1; 
                $StartDate = $row[7]; 
                $ExpectedFinishDate = $row[8];
                $ActualFinishDate = $row[9];
                $ProgrammeStatus = $row[6];
                $LearnerFirstName = $row[1];
                $LearnerLastName = $row[2];

                // Insert into `learningprogress` and get the ProgressID
                $stmtProgress = $mysqli->prepare("INSERT INTO learningprogress (UnitID, LearnerFirstName, LearnerLastName, StartDate, ExpectedFinishDate, ActualFinishDate, ProgrammeStatus, UnitUpdate) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmtProgress->bind_param("issssss", $UnitID, $LearnerFirstName, $LearnerLastName, $StartDate, $ExpectedFinishDate, $ActualFinishDate, $ProgrammeStatus);
                $stmtProgress->execute();
                $progressID = $mysqli->insert_id;
                $stmtProgress->close();

                
                $ident = $row[0]; 
                $UniqueLearnerNumber = $row[12];
                $TutorID = 2; 
                $EmployerID = 1; 
                $OTJID = 1; 
                $EmploymentID = 1; 
                $ApprenticeshipID = 1; 
                $TemplateID = 1; 
                $Cohort = $row[3]; 
                $Site = $row[4]; 
                $DayReleaseDay = $row[18]; 
                $Active = 'Active'; 
                

                $stmtLearner = $mysqli->prepare("INSERT INTO learner (ident, UniqueLearnerNumber, TutorID, EmployerID, ProgressID, OTJID, EmploymentID, ApprenticeshipID, TemplateID, LearnerFirstName, LearnerLastName, Cohort, Site, DayReleaseDay, Active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtLearner->bind_param("isiiiiiiissssss", $ident, $UniqueLearnerNumber, $TutorID, $EmployerID, $progressID, $OTJID, $EmploymentID, $ApprenticeshipID, $TemplateID, $LearnerFirstName, $LearnerLastName, $Cohort, $Site, $DayReleaseDay, $Active);
                $stmtLearner->execute();
                $stmtLearner->close();
            }
            

            echo "<script>alert('Successfully Imported'); window.location.href = window.location.href;</script>";
        } else {
            echo "<script>alert('Error in uploading file');</script>";
        }
    } else {
        echo "<script>alert('Invalid file extension');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Import Excel To MySQL</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="excel" required>
        <button type="submit" name="import">Import</button>
    </form>
</body>

</html>

