<?php
session_start();
require_once '../Model/jobModel.php';

$employeeId = $_SESSION['user_id'];
$jobs = getJobsByEmployee($employeeId);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Posted Jobs</title>
    <link rel="stylesheet" href="css/viewJobsStyles.css">
</head>
<body>
    <div class="jobs-container">
        <h2>Your Posted Jobs</h2>
        <?php if (count($jobs) > 0): ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($jobs as $job): ?>
                    <tr>
                        <td><?php echo $job['title']; ?></td>
                        <td><?php echo $job['description']; ?></td>
                        <td>
                            <a href="manage_applications.php?job_id=<?php echo $job['id']; ?>" class="manage-btn">Manage Applications</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No jobs posted yet.</p>
        <?php endif; ?><br>
        <button onclick="window.history.back()">Back</button>
    </div>
</body>
</html>
<?php
include('../View/about_us.php');
?>
