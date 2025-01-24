<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link rel="stylesheet" href="css/verifyOtpStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Verify OTP</h2>
        <form id="verifyOtpForm" method="POST">
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp"><br><br>
            <button type="button" id="verifyOtpButton">Verify OTP</button>
        </form>
        <p id="responseMessage"></p>
        <button onclick="window.location.href='forgot_password.php'" class="back-button">Back</button>
    </div>
    <script src="js/verifyOtp.js"></script>
</body>
</html>
