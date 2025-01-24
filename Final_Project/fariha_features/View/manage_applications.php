<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


$jobId = isset($_GET['job_id']) ? intval($_GET['job_id']) : null;

if (!$jobId || !isJobOwnedByEmployee($_SESSION['user_id'], $jobId)) {
    echo "Invalid job ID.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Applications</title>
    <link rel="stylesheet" href="css/manageApplicationsStyles.css">
</head>
<body>
    <div class="applications-container">
        <h2>Applications for Job #<?php echo $jobId; ?></h2>
        <div id="applicationsTable">
        </div>
        <button onclick="window.history.back()">Back</button>
    </div>
    <script>
        const jobId = <?php echo json_encode($jobId); ?>;
    </script>
    <script src="js/manageApplications.js"></script>
</body>
</html>
<?php
include('../View/about_us.php');
?>
