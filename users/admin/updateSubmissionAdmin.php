<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Submissions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" type="text/css" href="../../css/tabledesign.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <?php
    session_start();
    require_once '../../db/dbconnection.php';

    if (!isset($_SESSION['userID'])) {
        header("Location: ../../credentials/login.php");
        exit;
    }

    $userID = $_SESSION['userID'];

    $queryDetails = "SELECT * FROM tutor WHERE TutorID = ?";
    $stmtDetails = $mysqli->prepare($queryDetails);
    $stmtDetails->bind_param("i", $userID);
    $stmtDetails->execute();
    $resultDetails = $stmtDetails->get_result();
    $details = $resultDetails->fetch_object();
    $stmtDetails->close();

    if (!isset($_POST['progressID'])) {
        echo "Progress ID not provided.";
        exit;
    }
    $progressID = $_POST['progressID'];

    $query = "SELECT pu.UnitID, u.UnitName, u.SubmissionDate, pu.CurrentStatus
          FROM progressunits pu
          INNER JOIN units u ON pu.UnitID = u.UnitID
          WHERE pu.ProgressID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $progressID);
    $stmt->execute();
    $result = $stmt->get_result();

    $today = date("Y-m-d");

    while ($row = $result->fetch_assoc()) {
        if ($today > $row['SubmissionDate'] && $row['CurrentStatus'] === 'Uncompleted') {
            
            $updateQuery = "UPDATE progressunits SET CurrentStatus = 'Overdue' WHERE UnitID = ? AND ProgressID = ?";
            $updateStmt = $mysqli->prepare($updateQuery);
            $updateStmt->bind_param("ii", $row['UnitID'], $progressID);
            $updateStmt->execute();
            $updateStmt->close();
    
            $row['CurrentStatus'] = 'Overdue';
        }
    }
    $stmt->close();
    ?>

    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="../../images/logos/gtalogo.png" alt="profile_picture">
                <h3><?php echo "{$details->TutorFirstName} {$details->TutorLastName}"; ?></h3>
                <p><?php echo $details->Role; ?></p>
            </div>
            <ul>
                <li><a href="tutor.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Profile Details</span>
                    </a>
                </li>
                <li><a href="attendanceLanding.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">View Attendance</span>
                    </a>
                </li>
                <li><a href="viewLearnersTutor.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">View Learners</span>
                    </a>
                </li>
                <li><a href="viewOTJTutor.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Off The Job Hours</span>
                    </a>
                </li>
                <li><a href="manageSubmissionAdmin.php" class="active">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Submissions</span>
                    </a>
                </li>
                <li><a href="../../credentials/login.php">
                        <span class="icon"><i class="fas fa-door-open"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#"><i class="fas fa-bars"></i></a>
                </div>
            </div>
            <div class="container">
                <h2>Learner Units</h2>
                <br>
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th>UnitID</th>
                            <th>Unit Name</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $result->data_seek(0);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['UnitID']}</td>
                                <td>{$row['UnitName']}</td>
                                <td>{$row['SubmissionDate']}</td>
                                <td>{$row['CurrentStatus']}</td>
                                <td>
                                    <form method='POST' action='../../credentials/query/updateSubmissionVerification.php'>
                                        <input type='hidden' name='unitId' value='{$row['UnitID']}'>
                                        <input type='hidden' name='progressId' value='{$progressID}'>
                                        <input type='password' name='password' placeholder='Enter Password' required>
                                        <input type='submit' value='Complete Task'>
                                    </form>
                                </td>
                              </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="javascript:history.back()" class="back-button">&#8592; Back</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $("body").toggleClass("active");
            });
        });
    </script>

</body>

</html>