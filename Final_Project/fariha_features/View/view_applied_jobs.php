<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Applied Jobs</title>
    <link rel="stylesheet" href="css/viewAppliedJobsStyles.css">
</head>
<body>
    <div class="applied-jobs-container">
        <h2>Your Applied Jobs</h2>
        <div id="appliedJobsTable">
        </div>
        <button onclick="window.history.back()">Back</button>
        <button onclick="window.location.href='homepage.php'">Home</button>
    </div>
    <script src="js/viewAppliedJobs.js"></script>
</body>
</html>
<?php
include('../View/about_us.php');
?>
