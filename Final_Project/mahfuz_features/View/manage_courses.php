<?php
session_start();
require_once '../Model/courseModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$courses = getCoursesByPublisher($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Courses</title>
    <link rel="stylesheet" href="css/coursesStyles.css">
</head>
<body>
    <div class="container">
        <h1>Manage Courses</h1>
        <button onclick="window.location.href='publish_course.php'">Publish a New Course</button>
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
                            <button onclick="window.location.href='course_applicants.php?course_id=<?php echo $course['id']; ?>'">View Applicants</button>
                            <form method="POST" action="../Controller/manageCoursesController.php" style="display:inline;">
                                <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                                <button type="submit" name="action" value="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='employee_dashboard.php'">Back to Dashboard</button>
    </div>
</body>
</html>
