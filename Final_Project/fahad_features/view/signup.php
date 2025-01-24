<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <strong>Job Publisher</strong>
            <strong>User</strong>
        </div>
        <h2>Sign Up</h2>
        <div class="form-container">
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Role:</td>
                        <td>
                            <select name="role" required>
                                <option value="job_publisher">Job Publisher</option>
                                <option value="user">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="signup" value="Sign Up">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="footer">
            Already have an account? <a href="signin.php">Sign In</a>
        </div>
        <?php if (isset($errorMessage)) : ?>
            <p style="color: red; text-align: center;"><?= $errorMessage; ?></p>
        <?php endif; ?>
        <?php if (isset($successMessage)) : ?>
            <p style="color: green; text-align: center;"><?= $successMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
