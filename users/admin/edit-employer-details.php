<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Employer Info</title>
  <link rel="stylesheet" href="../../css/learnerinfo.css">
  <link rel="stylesheet" type="text/css" href="../../css/learnerprogress.css">
  <link rel="stylesheet" type="text/css" href="../../css/sidebarStyling.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<?php
session_start();
require_once '../../db/dbconnection.php';

$userID = $_SESSION['userID'];
$employerID = $_POST['employerID']; // Assuming you get this from a previous page or form

$queryTutor = "SELECT * FROM tutor WHERE TutorID = '$userID'";
$resultTutor = $mysqli->query($queryTutor);

$details = $resultTutor->fetch_object();

$sql = "SELECT EmployerFirstName, EmployerLastName, EmployerEmail FROM employer WHERE EmployerID = ? ";

$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "i", $employerID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $EmployerFirstName, $EmployerLastName, $EmployerEmail);

if (!mysqli_stmt_fetch($stmt)) {
  echo "0 results";
}

mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

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
        <div class="main">
          <div class="card">
            <div class="card-body">
              <table class="info-table">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>
                      <form action="../../credentials/query/edit-employerquery.php" method="post">
                        <input type="text" name="employerFirstName" value="<?php echo $EmployerFirstName; ?>" required />
                        <input type="text" name="employerLastName" value="<?php echo $EmployerLastName; ?>" required />
                        <input type="hidden" name="employerID" value="<?php echo $employerID; ?>" />
                        <button type="submit">Edit</button>
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>
                      <form action="../../credentials/query/edit-employerquery.php" method="post">
                        <input type="email" name="email" value="<?php echo $EmployerEmail; ?>" required />
                        <input type="hidden" name="employerID" value="<?php echo $employerID; ?>" />
                        <button type="submit">Edit</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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

</html>
