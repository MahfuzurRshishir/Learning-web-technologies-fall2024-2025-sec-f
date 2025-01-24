<!DOCTYPE html>
<html>
<head>
    <title>Post Job</title>
    <link rel="stylesheet" href="CSS/manageJobsStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Post a New Job</h2>
        <form id="postJobForm" method="POST" action="../Controller/manageJobsController.php">
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title"><br><br>
            <label for="description">Job Description:</label>
            <textarea id="description" name="description"></textarea><br><br>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location"><br><br>
            <label for="min_salary">Minimum Salary (BDT):</label>
            <input type="number" id="min_salary" name="min_salary"><br><br>
            <label for="max_salary">Maximum Salary (BDT):</label>
            <input type="number" id="max_salary" name="max_salary"><br><br>
            <button type="submit" name="action" value="post">Post Job</button>
        </form>
        <button onclick="window.location.href='employee_dashboard.php'">Back</button>
    </div>
</body>
</html>
