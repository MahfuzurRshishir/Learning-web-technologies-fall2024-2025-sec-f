<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="css/employeeDashboardStyles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Employee</h1>
        <div class="buttons-container">
            <button onclick="window.location.href='profile.php'">Manage Profile</button>
            <button onclick="window.location.href='manage_jobs.php'">Manage Jobs</button>
            <button onclick="window.location.href='job_applications.php'">View Job Applications</button>
            <button onclick="window.location.href='post_job.php'">Post a Job</button>
            <button onclick="window.location.href='manage_salaries.php'">Manage Salaries</button>
            <button onclick="window.location.href='manage_courses.php'">Manage E-Learning Courses</button>
            <button onclick="window.location.href='course_applicants.php'">View Course Applicants</button>
            <button onclick="window.location.href='../Controller/logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>

