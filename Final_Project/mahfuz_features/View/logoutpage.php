<?php
session_start();

// Handle logout when the button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ../View/loginpage.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" href="css/logoutStyles.css">
</head>
<body>
    <div class="logout-container">
        <h1>Are you sure you want to logout?</h1>
        <form method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
