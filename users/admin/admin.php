<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Home</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     
    }

    .container h2 {
      font-size: 20px;
      color: #333;
      margin-bottom: 15px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }

    .container table {
      width: 100%;
    }

    .container table tr td {
      padding: 10px 0;
    }

    .container label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    .container input[type="email"],
    .container input[type="password"] {
      width: calc(70% - 20px);
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .container button {
      padding: 8px 20px;
      border: none;
      border-radius: 5px;
      background-color: #8d599f;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .container button:hover {
      background-color: #0056b3;
    }
  </style>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$role = $_SESSION['userRole'];
if ($role == 'admin'){

$queryDetails = "SELECT * FROM tutor WHERE TutorID = '$userID'"; 
$resultDetails = $mysqli->query($queryDetails);

$details = $resultDetails -> fetch_object();
?>

<body>

  <div class="wrapper">
    <div class="sidebar">
      <div class="profile">
        <img src="http://localhost/GroupTrainingAssociation/images/logos/gtalogo.png" alt="profile_picture">
        <?php 
        echo"<h3>{$details->TutorFirstName} {$details->TutorLastName}</h3>";
        echo"<p>{$details->Role}</p>";
        ?>
      </div>
      <ul>
        <li><a href="admin.php" class="active">
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
        <h2>Your Details</h2>
        <table>
          <tr>
            <td><strong>Name:</strong></td>
            <td><?php echo "{$details->TutorFirstName} {$details->TutorLastName}"; ?></td>
          </tr>
          <tr>
            <td><strong>Tutor code:</strong></td>
            <td><?php echo "{$details->TutorCode}"; ?></td>
          </tr>
          <tr>
            <td><strong>Role:</strong></td>
            <td><?php echo "{$details->Role}"; ?></td>
          </tr>
          <tr>
            <td><label>Email:</label></td>
            <td>
              <form action="updateAdminInfo.php" method="post">
                <input type="email" name="email" value="<?php echo "{$details->TutorEmail}"; ?>" required />
                <input type="hidden" name="tutorID" value="<?php echo "{$details->TutorID}"; ?>" />
                <button type="submit">Change Email</button>
              </form>
            </td>
          </tr>
          <tr>
            <td><label>Password:</label></td>
            <td>
              <form action="../../credentials/query/updateTutorPassword.php" method="post">
                <input type="password" id="password" name="password" value="<?php echo "{$details->TutorPassword}"; ?>" required />
                <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</button>
                <input type="hidden" name="tutorID" value="<?php echo "{$details->TutorID}"; ?>" />
                <button type="submit">Change Password</button>
              </form>
            </td>
          </tr>
        </table>
      </div>
    </div>

  <script type="text/javascript">
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
      document.querySelector("body").classList.toggle("active");
    })

    function togglePasswordVisibility() 
    {
    var passwordInput = document.getElementById('password');
    var toggleButton = document.querySelector('.toggle-password');
    if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleButton.innerHTML = '&#128065;'; // Change to an "open eye" icon if you wish
    } else {

    passwordInput.type = 'password';
    toggleButton.innerHTML = '&#128065;'; // Change back to the original icon
    }
        }
  </script>

</body>
<?php } else { ?>
<body> <p> You don't have access to this page </p> </body>
<?php } ?>

</html>
