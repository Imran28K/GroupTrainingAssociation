<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/navfoot.css">

</head>

<?php
    session_start();
    $_SESSION['userID'] = ""; 
?>

<body>
    
    <div class="login-container">
        <h1>Sign In</h1>
        <form action="query/loginquery.php" method="post" class="login-form">
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div class="input-group">
                
                <span class="input-icon">&#128274;</span> <!-- Unicode lock icon for password -->
                <input type="password" id="password" name="password" required placeholder="Password">
                <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</button> <!-- Unicode eye icon -->
            </div>

            <button type="submit" name="submit" class="login-button">Sign In</button>
            <div class="form-footer">
                <a href="forgotpassword.php" class="link">Forgot Password?</a>
            </div>
        </form>
    </div>
    

    <script>

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

</html>