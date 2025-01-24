<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}

$applications = getUserApplications($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Applied Jobs</title>
    <link rel="stylesheet" href="css/appliedJobsStyles.css">
</head>
<body>
    <div class="container">
        <h1>Applied Jobs</h1>
        <table>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Salary Range</th>
                    <th>Application Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['title']); ?></td>
                        <td><?php echo htmlspecialchars($application['description']); ?></td>
                        <td><?php echo htmlspecialchars($application['location']); ?></td>
                        <td><?php echo htmlspecialchars($application['min_salary']); ?> - <?php echo htmlspecialchars($application['max_salary']); ?> BDT</td>
                        <td><?php echo htmlspecialchars($application['application_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='user_homepage.php'">Back to Home</button>
    </div>
</body>
</html>
