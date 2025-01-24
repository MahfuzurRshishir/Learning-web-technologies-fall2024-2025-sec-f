<?php
session_start();
require_once '../Model/salaryModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$salaries = getSalariesByEmployee($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Salaries</title>
    <link rel="stylesheet" href="css/manageSalariesStyles.css">
</head>
<body>
    <div class="container">
        <h1>Manage Salaries</h1>
        <button onclick="window.location.href='add_salary.php'">Add Salary</button>
        <table>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Salary Range</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaries as $salary): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($salary['job_title']); ?></td>
                        <td><?php echo htmlspecialchars($salary['location']); ?></td>
                        <td><?php echo htmlspecialchars($salary['min_salary']); ?> - <?php echo htmlspecialchars($salary['max_salary']); ?> BDT</td>
                        <td>
                            <button onclick="window.location.href='edit_salary.php?id=<?php echo $salary['id']; ?>'">Edit</button>
                            <button onclick="return deleteSalary(<?php echo $salary['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='employee_dashboard.php'">Back to Dashboard</button>
    </div>
    <script src="js/manageSalaries.js"></script>
</body>
</html>
