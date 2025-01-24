<?php
session_start();
require_once '../Model/jobModel.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'Employee') {
    header('Location: login.php');
    exit();
}

$job_id = $_GET['job_id'] ?? null;

if (!$job_id) {
    header('Location: manage_jobs.php');
    exit();
}

$applications = getApplicationsByJobId($job_id); 
$job_name = getJobNameByJobID($job_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Applications</title>
    <link rel="stylesheet" href="css/jobApplicationsStyles.css">
</head>
<body>
    <div class="container">
        <h1>Applications for Job <?php echo "Title: ".$job_name." -----ID: ".htmlspecialchars($job_id); ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Applicantion ID</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Resume</th>
                    <th>Application Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['id']); ?></td>
                        <td><?php echo htmlspecialchars($application['name']); ?></td>
                        <td><?php echo htmlspecialchars($application['email']); ?></td>
                        <td>
                            <?php if ($application['resume_path']): ?>
                                <a href="../uploads/resumes/<?php echo htmlspecialchars($application['resume_path']); ?>" download>Download Resume</a>
                            <?php else: ?>
                                No Resume
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($application['application_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='manage_jobs.php'">Back to Manage Jobs</button>
    </div>
</body>
</html>
