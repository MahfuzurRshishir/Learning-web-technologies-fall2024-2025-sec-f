<?php

session_start();

require_once '../Model/applicationModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobId = intval($_POST['job_id']);
    $userId = $_SESSION['user_id'];
    $resumePath = null;
    $errors = [];

    if (!$jobId) {
        $errors[] = "Invalid job ID.";
    }

    if (!empty($_FILES['resume']['name'])) {
        $targetDir = "../uploads/resumes/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $resumePath = $targetDir . basename($_FILES['resume']['name']);
        if (!move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath)) {
            $errors[] = "Failed to upload resume.";
        }
    } else {
        $errors[] = "Resume file is required.";
    }

    if (count($errors) === 0) {
        if (applyForJob($userId, $jobId, $resumePath)) {
            echo "Successfully applied for the job!";
        } else {
            echo "Failed to apply for the job.";
        }
    } else {
        echo json_encode($errors);
    }
}
?>
