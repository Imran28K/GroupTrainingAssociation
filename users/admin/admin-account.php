<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once ("../../db/dbconnection.php");

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryDetails = "SELECT * FROM tutor WHERE TutorID = ?"; 
$stmt = $mysqli->prepare($queryDetails);
$stmt->bind_param('i', $userID);
$stmt->execute();
$resultDetails = $stmt->get_result();
$details = $resultDetails->fetch_object();
$stmt->close();

$queryTutors = "SELECT * FROM tutor WHERE Role = 'Admin'"; 
$resultTutors = $mysqli->query($queryTutors); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate/Deactivate Admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<style>
    /* Add your custom CSS here */
    .sidebar ul li a:hover {
        text-decoration: none;
    }
</style>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="profile">
            <img src="../../images/logos/gtalogo.png" alt="profile_picture">
            <?php 
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
        <h1>Admin accounts</h1>
        <h2>Make sure not to accidentally de-activate your own account as another admin would have to let you back on</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Admin name</th>
              <th>Account status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($obj = $resultTutors->fetch_object()) {
              $action = ($obj->Active == "Inactive") ? "Reactivate Account" : "Deactivate Account";
              $formAction = ($obj->Active == "Inactive") ? "activate.php" : "deactivate.php";
              echo "<tr>
                      <td>{$obj->TutorFirstName} {$obj->TutorLastName}</td>
                      <td>{$obj->Active}</td>
                      <td>
                          <form id='deactivateForm{$obj->TutorID}' action='../../credentials/query/{$formAction}' name='attendance' method='post'>
                              <input type='hidden' name='userID' value='{$obj->TutorID}'>
                              <input type='hidden' name='role' value='Tutor'>
                              <button class='btn btn-primary btn-sm' onclick='confirmDeactivation({$obj->TutorID})'>{$action}</button>
                          </form>
                      </td>
                  </tr>";
            } ?>
          </tbody>
        </table>
        <ul class='nav nav-pills nav-stacked' role='tablist'>
          <li><a href='accountManagement.php'>Back to account management</a></li>
        </ul>
      </div>
    </div>
</div>

<script type="text/javascript">
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
        document.querySelector("body").classList.toggle("active");
    })

    function confirmDeactivation(adminID) {
        var confirmation = confirm("Are you sure you want to deactivate this account?");
        if (confirmation) {
            document.getElementById("deactivateForm" + adminID).submit();
        }
    }

    function cancelDeactivation() {
        window.location.href = 'admin-account.php'; // Redirect to admin-account.php if cancel is clicked
    }
</script>
</body>
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
