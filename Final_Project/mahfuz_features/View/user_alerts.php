<?php
session_start();
require_once '../Model/alertModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}

$alerts = getUserAlerts($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Alerts</title>
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
        <button onclick="window.location.href='user_homepage.php'">Back to Home</button>
    </div>
</body>
</html>
