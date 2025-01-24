<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signupStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="signupForm" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <label for="usertype">User Type:</label>
            <select id="usertype" name="usertype">
                <option value="User">User</option>
                <option value="Employee">Employee</option>
            </select><br><br>
            <button type="button" id="signupButton">Sign Up</button>
        </form>
        <p id="responseMessage"></p>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>
