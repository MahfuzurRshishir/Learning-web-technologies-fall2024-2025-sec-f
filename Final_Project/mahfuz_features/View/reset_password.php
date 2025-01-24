<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/resetPasswordStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <form id="resetPasswordForm" method="POST">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password"><br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password"><br><br>
            <button type="button" id="resetPasswordButton">Reset Password</button>
        </form>
        <p id="responseMessage"></p>
        <button onclick="window.location.href='login.php'" class="back-button">Back to Login</button>
    </div>
    <script src="js/resetPassword.js"></script>
</body>
</html>
