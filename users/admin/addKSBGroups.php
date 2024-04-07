<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add KSB Group</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            padding: 30px 0;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .section {
            margin-left: 250px;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 30px;
            color: #343a40;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #343a40;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .create-group {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .create-group:hover {
            background-color: #0056b3;
        }

        .back-link {
            margin-top: 20px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryLearner = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultLearner = $mysqli->query($queryLearner);

$details = $resultLearner -> fetch_object();
?>

<body>

    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="../../images/logos/gtalogo.png" alt="profile_picture">
                <?php 
        echo"<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
        echo"<p>{$details->Role}</p>";
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
                <li><a href="adminConsole.php" class="active">
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
                <h1>Add KSB Group</h1>
                <form action="../../credentials/query/createGroup.php" method="post" class="login-form">
                    <div class="input-group">
                        <label for="unitName">Unit name </label>
                        <input type="text" id="unitName" name="unitName" required>
                    </div>
                    <div class="input-group">
                        <label for="date">Submission date </label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <button type="submit" name="submit" class="create-group">Create Group</button>
                </form>
                <div class="back-link">
                    <a href='adminConsole.php'>Back</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function() {
            document.querySelector("body").classList.toggle("active");
        })
    </script>

</body>
<?php } else { ?>
    <body>
        <p>You don't have access to this page</p>
    </body>
<?php } ?>

</html>
