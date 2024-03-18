<?php
// Fetch data from the database
function fetchSubmissionDetails($connection, $userID) {
    $submissions = array();

    // SQL query to fetch ProgressID from the learner table
    $query = "SELECT ProgressID FROM learner WHERE UniqueLearnerNumber = '$userID'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Fetch ProgressID
        $progressIDs = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $progressIDs[] = $row['ProgressID'];
        }
        mysqli_free_result($result);

        // Fetch additional details for each ProgressID
        foreach ($progressIDs as $progressID) {
            // Query to fetch UnitID from learningprogress table
            $query = "SELECT UnitID FROM learningprogress WHERE ProgressID = '$progressID'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                // Fetch UnitID
                $unitIDs = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $unitIDs[] = $row['UnitID'];
                }
                mysqli_free_result($result);

                // Fetch unit details from units table for each UnitID
                foreach ($unitIDs as $unitID) {
                    $query = "SELECT unit, due, status FROM units WHERE UnitID = '$unitID'";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Combine ProgressID, unit details
                            $submissions[] = array(
                                'ProgressID' => $progressID,
                                'unit' => $row['unit'],
                                'due' => $row['due'],
                                'status' => $row['status']
                            );
                        }
                        mysqli_free_result($result);
                    } else {
                        // Handle query error
                        echo "Error: " . mysqli_error($connection);
                    }
                }
            } else {
                // Handle query error
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($connection);
    }

    return $submissions;
}
?>

