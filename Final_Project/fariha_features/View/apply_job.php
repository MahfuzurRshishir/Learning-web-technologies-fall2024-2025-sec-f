<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}



$jobId = isset($_GET['job_id']) ? intval($_GET['job_id']) : null;

if (!$jobId) {
    echo "Invalid job ID.";
    exit();
}

$job = getJobById($jobId);
if (!$job) {
    echo "Job not found.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Apply for Job</title>
    <link rel="stylesheet" href="css/applyJobStyles.css">
</head>
<body>
    <div class="apply-container">
        <h2>Apply for Job: <?php echo htmlspecialchars($job['title']); ?></h2>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($job['description']); ?></p>
        <form id="applyJobForm" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">
            <label for="resume">Upload Resume:</label><br>
            <input type="file" id="resume" name="resume"><br><br>
            <button type="button" id="applyButton">Apply</button>
        </form>
        <div id="responseMessage"></div><br>
        <button onclick="window.history.back()">Back</button>
    </div>
    <script src="js/applyJob.js"></script>
</body>
</html>
    <?php
    include('../View/about_us.php');
    ?>
