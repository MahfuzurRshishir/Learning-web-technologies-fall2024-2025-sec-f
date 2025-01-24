<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgotPasswordStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <button type="button" id="forgotPasswordButton">Send OTP</button>
        </form>
        <p id="responseMessage"></p>
        <button onclick="window.location.href='login.php'" class="back-button">Back to Login</button>
    </div>
    <script src="../View/js/forgotPassword.js"></script>
</body>
</html>
