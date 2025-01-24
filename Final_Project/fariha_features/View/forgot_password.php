<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgotPasswordStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
            <button type="button" id="resetButton">Reset Password</button>
        </form>
        <div id="responseMessage"></div>
        <p><a href="login.php">Back to Login</a></p>
    </div>
    <script src="js/forgotPassword.js"></script>
</body>
</html>
