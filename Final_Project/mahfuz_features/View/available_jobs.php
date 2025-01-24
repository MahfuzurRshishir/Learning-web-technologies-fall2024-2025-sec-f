<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}

$jobs = getAvailableJobs();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Jobs</title>
    <link rel="stylesheet" href="css/availableJobsStyles.css">
</head>
<body>
    <div class="container">
        <h1>Available Jobs</h1>
        <table>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Salary Range</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($job['title']); ?></td>
                        <td><?php echo htmlspecialchars($job['description']); ?></td>
                        <td><?php echo htmlspecialchars($job['location']); ?></td>
                        <td><?php echo htmlspecialchars($job['min_salary']); ?> - <?php echo htmlspecialchars($job['max_salary']); ?> BDT</td>
                        <td>
                            <?php if (hasApplied($user_id, $job['id'])): ?>
                                <span>Already Applied</span>
                            <?php else: ?>
                                <form method="POST" action="../Controller/browseJobsController.php" enctype="multipart/form-data">
                                    <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                                    <label for="resume">Upload Resume (Optional):</label>
                                    <input type="file" name="resume">
                                    <button type="submit" name="action" value="apply">Apply</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='user_homepage.php'">Back to Home</button>
    </div>
</body>
</html>
