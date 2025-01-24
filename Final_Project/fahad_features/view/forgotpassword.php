<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../css/forgotpassword.css">
</head>
<body>

    <div class="container">
        <div class="nav-header">
            <div><strong>Job Publisher</strong></div>
            <div><strong>User</strong></div>
        </div>

        <h2>Forgot Password</h2>

        <form method="POST" action="">
            <table align="center" cellpadding="10" width="100%">
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="reset_password" value="Reset Password">
                    </td>
                </tr>
            </table>
        </form>

        <p>Remember your password? <a href="signin.php">Sign In</a></p>

        <div class="footer">
            <p>&copy; 2025 Job Publisher. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
