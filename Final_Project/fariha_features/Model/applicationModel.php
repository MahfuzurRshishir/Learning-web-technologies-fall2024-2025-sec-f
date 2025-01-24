<?php
require_once 'db.php';

function getApplicationsByUser($userId) {
    global $conn;
    $query = "SELECT jobs.title, applications.status FROM nowshin_applications 
              JOIN nowshin_jobs ON applications.job_id = jobs.id 
              WHERE applications.user_id = '$userId'";
    $result = mysqli_query($conn, $query);
    $applications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }
    return $applications;
}
function applyForJob($userId, $jobId, $resumePath) {
    global $conn;
    $query = "INSERT INTO nowshin_applications (user_id, job_id, resume_path, status) VALUES ('$userId', '$jobId', '$resumePath', 'pending')";
    return mysqli_query($conn, $query);
}

function getJobById($jobId) {
    global $conn;
    $query = "SELECT * FROM nowshin_jobs WHERE id = '$jobId'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

?>
