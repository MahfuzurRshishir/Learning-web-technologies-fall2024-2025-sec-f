<?php
session_start();
require_once '../Model/userModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


$userId = $_SESSION['user_id'];
$userRole = $_SESSION['user_role'];
$userName = getUserNameById($userId); 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Homepage</title>
    <link rel="stylesheet" href="css/homepageStyles.css">
</head>
<body>
    <div class="homepage-container">
        <h1>Welcome, <?php echo $userName; ?>!</h1>
        <p>Select an option below:</p>
        <div class="menu-options">
            <?php if ($userRole === 'employee'): ?>
                <a href="post_job.php" class="menu-btn">Post a Job</a>
                <a href="view_jobs.php" class="menu-btn">View Your Jobs</a>
                <a href="career_resources.php" class="menu-btn">Career Resources</a>

            <?php elseif ($userRole === 'user'): ?>
                <a href="browse_jobs.php" class="menu-btn">Browse Jobs</a>
                <a href="view_applied_jobs.php" class="menu-btn">View Applied Jobs</a>
                <a href="career_resources.php" class="menu-btn">Career Resources</a>

            <?php endif; ?>
            <br><a href="../Controller/logout.php" class="menu-btn">Logout</a>
        </div>
    </div>
</body>
</html>
<?php
include('../View/about_us.php');
?>
