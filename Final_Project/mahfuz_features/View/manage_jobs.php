<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$jobs = getJobsByEmployer($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Jobs</title>
    <link rel="stylesheet" href="css/manageJobsStyles.css">
</head>
<body>
    <div class="container">
        <h1>Manage Jobs</h1>
        <button onclick="window.location.href='post_job.php'">Post a New Job</button>
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
                            <button onclick="window.location.href='job_applications.php?job_id=<?php echo $job['id']; ?>'">View Applications</button>
                            <button onclick="deleteJob(<?php echo $job['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='employee_dashboard.php'">Back to Dashboard</button>
    </div>
    <script src="js/manageJobs.js"></script>
</body>
</html>
