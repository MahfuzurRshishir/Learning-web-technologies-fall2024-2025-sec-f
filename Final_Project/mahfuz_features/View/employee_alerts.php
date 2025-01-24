<?php
session_start();
require_once '../Model/alertModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$alerts = getEmployeeAlerts($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Alerts</title>
    <link rel="stylesheet" href="css/alertStyles.css">
</head>
<body>
    <div class="alert-container">
        <h1>Your Notifications</h1>
        <?php if (!empty($alerts)): ?>
            <ul>
                <?php foreach ($alerts as $alert): ?>
                    <li><?php echo htmlspecialchars($alert['message']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No new notifications.</p>
        <?php endif; ?>
        <button onclick="window.location.href='employee_dashboard.php'">Back to Dashboard</button>
    </div>
</body>
</html>
