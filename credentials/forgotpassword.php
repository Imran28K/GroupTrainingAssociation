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
    <?php include '../include/navbar.php'; ?>

    <div class="login-container">
        <h1>Email Verification</h1>

        <?php if (isset($_GET['emailSent'])) : ?>
        <div class="notification <?php echo $_GET['emailSent'] == 'true' ? 'success' : 'error'; ?>">
            <?php if ($_GET['emailSent'] == 'true') : ?>
                <span class="close-btn">&times;</span>
                <p>Please check your email inbox</p>
            <?php else : ?>
                <span class="close-btn">&times;</span>
                <p>Failed to send the email. Please try again later.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

        <?php if (isset($_GET['emailNotFound']) && $_GET['emailNotFound'] == 'true') : ?>
            <div class="notification error">
            <span class="close-btn">&times;</span>
                <p>The email does not exist in our records.</p>
            </div>
        <?php endif; ?>

        <br>

        <form action="query/forgotpassword-query.php" method="post" class="login-form">
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <button type="submit" class="login-button">Submit</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
</body>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {
        var closeButton = document.querySelector(".close-btn");
        if (closeButton) {
            closeButton.addEventListener("click", function() {
                this.parentElement.style.display = 'none';
            });
        }
    });
</script>

</html>