<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Homepage</title>
    <link rel="stylesheet" href="css/userHomepageStyles.css">
</head>
<body>
    <div class="homepage-container">
        <h1>Welcome, User</h1>
        <div class="buttons-container">
            <button onclick="window.location.href='profile.php'">Manage Profile</button>
            <button onclick="window.location.href='available_jobs.php'">Browse Jobs</button>
            <button onclick="window.location.href='applied_jobs.php'">View Applied Jobs</button>
            <button onclick="window.location.href='search_salaries.php'">Search Salaries</button>
            <button onclick="window.location.href='upcoming_courses.php'">View Upcoming Courses</button>
            <button onclick="window.location.href='applied_courses.php'">View Applied Courses</button>
            <button onclick="window.location.href='../Controller/logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>
