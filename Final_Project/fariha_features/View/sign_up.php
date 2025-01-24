<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signUpStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="signUpForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="employee">Employee</option>
            </select>
            <button type="button" id="signUpButton">Sign Up</button>
        </form>
        <div id="responseMessage"></div>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script src="js/signUp.js"></script>
</body>
</html>
