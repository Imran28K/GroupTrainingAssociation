<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/navfoot.css">
</head>

<body>
    <?php include '../navfooter/navbar.php'; ?>
    <div class="login-container">
        <h1>Sign In</h1>
        <form action="query/loginquery.php" method="post" class="login-form">
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <button type="submit" class="login-button">Sign In</button>
            <div class="form-footer">
                <a href="forgotpassword.php" class="link">Forgot Password?</a>
            </div>
        </form>
    </div>
    <?php include '../navfooter/footer.php'; ?>
</body>

</html>