<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/loginStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <button type="button" id="loginButton">Login</button>
        </form>
        <p id="responseMessage"></p>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p><a href="forgot_password.php">Forgot Password?</a></p>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
