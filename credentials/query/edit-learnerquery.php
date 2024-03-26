<?php
session_start();
require_once '../../db/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['learnerID'])) {
    $learnerID = $_POST['learnerID'];

    // Update Learner First Name and Last Name
    if (isset($_POST['learnerFirstName'], $_POST['learnerLastName'])) {
        $newFirstName = $_POST['learnerFirstName'];
        $newLastName = $_POST['learnerLastName'];

        $sql = "UPDATE learner SET LearnerFirstName = ?, LearnerLastName = ? WHERE UniqueLearnerNumber = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $newFirstName, $newLastName, $learnerID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Name updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating name.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    }

    // Update Cohort
    if (isset($_POST['cohort'])) {
        $newCohort = $_POST['cohort'];

        $sql = "UPDATE learner SET Cohort = ? WHERE UniqueLearnerNumber = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $newCohort, $learnerID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Cohort updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating cohort.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    }

    // Update Apprenticeship
    if (isset($_POST['apprenticeship'])) {
        $newApprenticeship = $_POST['apprenticeship'];

        $sql = "UPDATE learner SET ApprenticeshipName = ? WHERE UniqueLearnerNumber = ?";

        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $newApprenticeship, $learnerID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['success_message'] = 'Apprenticeship updated successfully.';
            } else {
                $_SESSION['error_message'] = 'Error updating apprenticeship.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
        }
    }


// Update Email Address
if (isset($_POST['email'])) {
    $newEmail = $_POST['email'];

    $sql = "UPDATE learner SET LearnerEmail = ? WHERE UniqueLearnerNumber = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $newEmail, $learnerID);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['success_message'] = 'Email address updated successfully.';
            $msg = "Email Changed Successfully";
        header("location: learnerinfo.php?msg=$msg");
        } else {
            $_SESSION['error_message'] = 'Error updating email address.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
    }
}


    // Update Start Date
if (isset($_POST['startDate'])) {
    $newStartDate = $_POST['startDate'];

    $sql = "UPDATE learner SET StartDate = ? WHERE UniqueLearnerNumber = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $newStartDate, $learnerID);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['success_message'] = 'Start date updated successfully.';
        } else {
            $_SESSION['error_message'] = 'Error updating start date.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
    }
}

// Update End Date
if (isset($_POST['endDate'])) {
    $newEndDate = $_POST['endDate'];

    $sql = "UPDATE learner SET EndDate = ? WHERE UniqueLearnerNumber = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $newEndDate, $learnerID);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['success_message'] = 'End date updated successfully.';
        } else {
            $_SESSION['error_message'] = 'Error updating end date.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = 'Failed to prepare the SQL statement.';
    }
}


    // Redirect back to learnerinfo.php
    header("location: ../../users/admin/edit-learner.php");
    exit();
} else {
    // If no POST data is received, redirect back to learnerinfo.php
    header("location: ../../users/admin/edit-learner.php");
    exit();
}
?>
