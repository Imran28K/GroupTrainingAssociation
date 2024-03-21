<?php
require_once '../../db/dbconnection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0) {
        $fileName = $_FILES["csv_file"]["name"];
        $fileTmpPath = $_FILES["csv_file"]["tmp_name"];
        
        // Open the CSV file
        if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
            // Skip the first line if it's the header
            fgetcsv($handle);
            
            // Loop through the file rows
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Prepare SQL query to insert data
                $sql = "INSERT INTO learner (ident, first_names, surname, site_code, site, programme) VALUES (?, ?, ?, ?, ?, ?)";
                
                // Prepare statement
                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("isssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                    
                    // Execute the prepared statement
                    $stmt->execute();
                }
            }
            fclose($handle);
            echo "CSV data imported successfully.";
        }
    } else {
        echo "Error: " . $_FILES["csv_file"]["error"];
    }
}
?>

<!-- HTML form for uploading the CSV file -->
<!DOCTYPE html>
<html>
<head>
    <title>CSV Import</title>
</head>
<body>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <label for="csv_file">Upload CSV:</label>
        <input type="file" name="csv_file" id="csv_file">
        <input type="submit" name="submit" value="Import">
    </form>
</body>
</html>
