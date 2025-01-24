<!DOCTYPE html>
<html>
<head>
    <title>Add Salary</title>
    <link rel="stylesheet" href="css/manageSalariesStyles.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="form-container">
        <h2>Add Salary</h2>
        <form id="addSalaryForm" method="POST" action="../Controller/manageSalariesController.php">
            <input type="hidden" name="action" value="add">
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" required><br><br>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br><br>
            <label for="min_salary">Minimum Salary (BDT):</label>
            <input type="number" id="min_salary" name="min_salary" required><br><br>
            <label for="max_salary">Maximum Salary (BDT):</label>
            <input type="number" id="max_salary" name="max_salary" required><br><br>
            <button type="submit">Add Salary</button>
        </form>
        <button onclick="window.location.href='manage_salaries.php'">Back</button>
    </div>
</body>
</html>
