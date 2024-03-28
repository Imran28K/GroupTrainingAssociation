<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("../../db/dbconnection.php");

$adminID = $_SESSION['userID'];
$role = $_SESSION['userRole'];

if ($role == 'admin') {
    $queryEmployers = "SELECT * FROM employer";
    $resultEmployers = $mysqli->query($queryEmployers);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employers</title>
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link rel="stylesheet" type="text/css" href="../../css/tabledesign.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="../../images/logos/gtalogo.png" alt="profile_picture">
                <h3>Admin</h3>
                <p>Admin</p>
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
                <h1>Edit Employers</h1>
                <br>
                <table>
                    <tr>
                        <th>Employer name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while ($employer = $resultEmployers->fetch_object()) {
                        $employerID = $employer->EmployerID;
                        echo "<tr>
                                <td>{$employer->EmployerFirstName} {$employer->EmployerLastName}</td>
                                <td>{$employer->EmployerEmail}</td>
                                <td>
                                    <form action='edit-employer-details.php' method='post'>
                                        <input type='hidden' name='employerID' value='$employerID' />
                                        <button type='submit'>Edit Details</button>     
                                    </form>
                                </td>
                            </tr>";
                    }
                    ?>
                </table>
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

<?php
} else {
?>
    <body>
        <p> You don't have access to this page </p>
    </body>
<?php
}
?>
</html>
