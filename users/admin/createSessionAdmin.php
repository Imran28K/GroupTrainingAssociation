<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="../../images/logos/gtalogo.png" alt="profile_picture">
            <?php 
            session_start();
            require_once '../../db/dbconnection.php';

            $userID = $_SESSION['userID'];

            $queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
            $resultLearner = $mysqli->query($queryLearner);

            if ($resultLearner && $resultLearner->num_rows > 0) {
                $details = $resultLearner->fetch_object();
            } else {
                // Handle the case when no details are found
                // You can set default values or show an error message
                $details = new stdClass(); // Create an empty object
                $details->TutorFirstName = "Unknown";
                $details->TutorLastName = "Unknown";
                $details->Role = "Unknown";
            }

            echo "<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
            echo "<p>{$details->Role}</p>";
            ?>
        </div>
        <ul>
            <li><a href="admin.php">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="item">Profile Details</span>
            </a>
            </li>
            <li><a href="attendanceLandingAdmin.php" class="active">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span class="item">View Attendance</span>
            </a>
            </li>
            <li><a href="viewLearnersAdmin.php">
                <span class="icon"><i class="fas fa-user-friends"></i></span>
                <span class="item">View learners</span>
            </a>
            </li>

            <li><a href="adminConsole.php">
                <span class="icon"><i class="fas fa-user-shield"></i></span>
                <span class="item">Admin Page</span>
            </a>
            </li>
            <li><a href="manageSubmissionAdmin.php">
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
            <h1>Create session</h1>
            <form action="../../credentials/query/createSession.php" method="post" class="login-form">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="timeStart">Session Start</label>
                    <input type="time" id="timeStart" name="timeStart" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="timeEnd">Session End</label>
                    <input type="time" id="timeEnd" name="timeEnd" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apprenticeship">Apprenticeship Session Group</label>
                    <input type="text" id="apprenticeship" name="apprenticeship" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Create Session</button>
            </form>
            <ul class='nav nav-pills nav-stacked' role='tablist'>
                <li><a href='attendanceLandingAdmin.php'>Back to Attendance</a></li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
        document.querySelector("body").classList.toggle("active");
    })
</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
