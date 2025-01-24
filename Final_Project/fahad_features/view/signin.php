<head>

    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css">

</head>
<body>
    <div class="container">
        <div class="nav-header">
            <strong>Job Publisher</strong>
            <strong>User</strong>
        </div>

        <h2>Sign In</h2>

        <div class="form-container">
            <form method="POST" action="">
                <table align="center" cellpadding="10" width="100%">
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="signin" value="Sign In">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p><a href="forgotpassword.php">Forgot Password?</a></p>

    </div>
</body>
</html>
