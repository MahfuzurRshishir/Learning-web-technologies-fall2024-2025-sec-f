<?php
session_start();
require_once '../Model/courseModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}

$courses = getUpcomingCourses();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Courses</title>
    <link rel="stylesheet" href="css/coursesStyles.css">
</head>
<body>
    <div class="container">
        <h1>Upcoming Courses</h1>
        <table>
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($course['title']); ?></td>
                        <td><?php echo htmlspecialchars($course['description']); ?></td>
                        <td><?php echo htmlspecialchars($course['start_date']); ?> to <?php echo htmlspecialchars($course['end_date']); ?></td>
                        <td>
                            <?php if (hasAppliedCourse($course['id'], $_SESSION['user_id'])): ?>
                                <span>Already Applied</span>
                            <?php else: ?>
                                <form method="POST" action="../Controller/courseApplicationsController.php">
                                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                                    <button type="submit" name="action" value="apply">Apply</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='user_homepage.php'">Back to Dashboard</button>
    </div>
</body>
</html>
