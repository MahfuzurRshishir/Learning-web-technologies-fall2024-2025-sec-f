<!DOCTYPE html>
<html>
<head>
    <title>Publish Course</title>
    <link rel="stylesheet" href="css/coursesStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Publish a New Course</h2>
        <form method="POST" action="../Controller/manageCoursesController.php">
            <label for="title">Course Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="description">Course Description:</label>
            <textarea id="description" name="description" required></textarea><br><br>
            
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required><br><br>
            
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required><br><br>
            
            <button type="submit" name="action" value="publish">Publish Course</button>
        </form>
        <button onclick="window.location.href='manage_courses.php'">Back</button>
    </div>
</body>
</html>
