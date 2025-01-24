<?php
session_start();
require_once '../Model/courseModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;
if (!$course_id) {
    header('Location: manage_courses.php');
    exit();
}

$applicants = getApplicantsByCourseId($course_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course Applicants</title>
    <link rel="stylesheet" href="css/coursesStyles.css">
</head>
<body>
    <div class="container">
        <h1>Applicants for Course ID: <?php echo htmlspecialchars($course_id); ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Application Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicants as $applicant): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($applicant['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['email']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['application_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='manage_courses.php'">Back to Manage Courses</button>
    </div>
</body>
</html>
