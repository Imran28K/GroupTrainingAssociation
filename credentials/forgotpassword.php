<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>

<body>
    <?php include '../navfooter/navbar.php'; ?>
    <div class="login-container">
        <h1>Email Verification</h1>
        <form action="query/forgotpassword-query.php" method="post" class="login-form">
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <button type="submit" class="login-button">Submit</button>
        </form>
    </div>
    <?php include '../navfooter/footer.php'; ?>
</body>

</html>