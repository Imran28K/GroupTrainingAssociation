<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <link rel="stylesheet" href="../css/createSession.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>

<body>
    <?php include '../include/navbar.php'; ?>
    <div class="attendance-container">
        <h1>Create session</h1>
        <form action="../credentials/query/createSession.php" method="post" class="login-form">
            <div class="input-group">
                <label for="date">date </label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="input-group">
                <label for="timeStart">session start </label>
                <input type="time" id="timeStart" name="timeStart" required>
            </div>
            <div class="input-group">
                <label for="timeEnd">session end </label>
                <input type="time" id="timeEnd" name="timeEnd" required>
            </div>
            <div class="input-group">
                <label for="apprenticeship">apprenticeship session group</label>
                <input type="apprenticeship" id="apprenticeship" name="apprenticeship" required>
            </div>
            <button type="submit" name="submit" class="attendance-submit">Create Session</button>
        </form>
    <ul class = 'nav nav-pills nav-stacked' role = 'tablist'>
        <li> <a href='../users/tutor/attendanceLanding.php'> Back attendance </a> </li>
    </ul>
    </div>
    <?php include '../include/footer.php'; ?>
</body>

</html>