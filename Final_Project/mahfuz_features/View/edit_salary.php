<?php
session_start();
require_once '../Model/salaryModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$salary_id = $_GET['id'] ?? null;
if (!$salary_id) {
    header('Location: manage_salaries.php');
    exit();
}

$salary = getSalaryById($salary_id);
if (!$salary) {
    header('Location: manage_salaries.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Salary</title>
    <link rel="stylesheet" href="CSS/manageSalariesStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Salary</h2>
        <form method="POST" action="../Controller/manageSalariesController.php">
            <input type="hidden" name="id" value="<?php echo $salary['id']; ?>">
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($salary['job_title']); ?>"><br><br>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($salary['location']); ?>"><br><br>
            <label for="min_salary">Minimum Salary (BDT):</label>
            <input type="number" id="min_salary" name="min_salary" value="<?php echo htmlspecialchars($salary['min_salary']); ?>"><br><br>
            <label for="max_salary">Maximum Salary (BDT):</label>
            <input type="number" id="max_salary" name="max_salary" value="<?php echo htmlspecialchars($salary['max_salary']); ?>"><br><br>
            <button type="submit" name="action" value="edit">Update Salary</button>
        </form>
        <button onclick="window.location.href='manage_salaries.php'">Back</button>
    </div>
</body>
</html>
