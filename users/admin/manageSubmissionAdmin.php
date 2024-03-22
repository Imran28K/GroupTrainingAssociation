<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Submissions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" type="text/css" href="../../css/tabledesign.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <?php
    session_start();
    require_once '../../db/dbconnection.php';

    $userID = $_SESSION['userID'];

    $queryDetails = "SELECT * FROM tutor WHERE TutorID = ?";
    $stmtDetails = $mysqli->prepare($queryDetails);
    $stmtDetails->bind_param("i", $userID);
    $stmtDetails->execute();
    $resultDetails = $stmtDetails->get_result();
    $details = $resultDetails->fetch_object();
    ?>

    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
                <?php
                if ($details) {
                    echo "<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
                    echo "<p>{$details->Role}</p>";
                }
                ?>
            </div>
            <ul>
        <li><a href="admin.php">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="item">Profile Details</span>
          </a>
        </li>
        <li><a href="attendanceLandingAdmin.php">
            <span class="icon"><i class="fas fa-desktop"></i></span>
            <span class="item">View Attendance</span>
          </a>
        </li>
        <li><a href="viewLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">View learners</span>
          </a>
        </li>
        <li><a href="updateLearnersAdmin.php">
            <span class="icon"><i class="fas fa-user-friends"></i></span>
            <span class="item">Update learners</span>
          </a>
        </li>
        <li><a href="adminConsole.php">
            <span class="icon"><i class="fas fa-user-shield"></i></span>
            <span class="item">Admin Page</span>
          </a>
        </li>
		<li><a href="manageSubmissionAdmin.php" class="active">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="item">Submissions</span>
          </a>
        </li>
        <li><a href="http://localhost/GroupTrainingAssociation/credentials/login.php">
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
                <h2>Manage Learner Submissions - Admin view</h2>
                <br>
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th>ProgressID</th>
                            <th>Learner</th>
                            <th>Programme Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryProgressIDs = "SELECT ProgressID FROM learner";
                        $stmt = $mysqli->prepare($queryProgressIDs);

                        $stmt->execute();
                        $resultProgressIDs = $stmt->get_result();

                        while ($row = $resultProgressIDs->fetch_assoc()) {
                            $progressID = $row['ProgressID'];

                            $queryLearnerDetails = "SELECT LearnerFirstName, LearnerLastName, ProgrammeStatus FROM learningprogress WHERE ProgressID = ?";
                            $stmtLearnerDetails = $mysqli->prepare($queryLearnerDetails);
                            $stmtLearnerDetails->bind_param("i", $progressID);
                            $stmtLearnerDetails->execute();
                            $resultLearnerDetails = $stmtLearnerDetails->get_result();

                            if ($details = $resultLearnerDetails->fetch_assoc()) {
                                $learnerFullName = $details['LearnerFirstName'] . ' ' . $details['LearnerLastName'];
                                $programmeStatus = $details['ProgrammeStatus'];

                                echo "<tr>
                                        <td>{$progressID}</td>
                                        <td>{$learnerFullName}</td>
                                        <td>{$programmeStatus}</td>
                                        <td>
                                          <form action='updateSubmission.php' method='post'>
                                            <input type='hidden' name='progressID' value='{$progressID}'>
                                            <button type='submit'>View Units</button>
                                           </form>
                                        </td>
                                      </tr>";
                            }
                            if ($stmtLearnerDetails) {
                                $stmtLearnerDetails->close();
                            }
                        }
                        if ($stmt) {
                            $stmt->close();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function() {
            document.querySelector("body").classList.toggle("active");
        });
    </script>

</body>

</html>