<?php
session_start();
require_once '../Model/courseModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$applications = getAppliedCoursesByUser($user_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Applied Courses</title>
    <link rel="stylesheet" href="css/coursesStyles.css">
</head>
<body>
    <div class="container">
        <h1>Your Applied Courses</h1>
        <table>
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Application Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['title']); ?></td>
                        <td><?php echo htmlspecialchars($application['description']); ?></td>
                        <td><?php echo htmlspecialchars($application['start_date']); ?> to <?php echo htmlspecialchars($application['end_date']); ?></td>
                        <td><?php echo htmlspecialchars($application['application_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='user_homepage.php'">Back to Dashboard</button>
    </div>
</body>
</html>
