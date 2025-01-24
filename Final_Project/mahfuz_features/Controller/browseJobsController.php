<?php
session_start();
require_once '../Model/jobModel.php';
require_once '../Model/alertModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'apply') {
    $job_id = $_POST['job_id'];
    $user_id = $_SESSION['user_id'];
    $resume_path = null;

    if (isset($_FILES['resume']) && $_FILES['resume']['name'] !== "") {
        $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (in_array($_FILES['resume']['type'], $allowed_types)) {
            $resume_directory = "../uploads/resumes/";
            if (!is_dir($resume_directory)) {
                mkdir($resume_directory, 0777, true); 
            }
            $resume_path = $resume_directory . basename($_FILES['resume']['name']);
            move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path);
        } else {
            echo "Invalid resume format.";
            exit();
        }
    }

    if (applyForJob($user_id, $job_id, $resume_path)) {
        $employer = getEmployerDetailsByJob($job_id);

        if ($employer) {
            $message = "A user has applied for your job: " . htmlspecialchars($employer['job_title']);
            createAlert($employer['id'], 'job_applied', $message);

            $to = $employer['email'];
            $subject = "New Job Application";
            $email_message = "Hello, you have a new application for your job posting: " . htmlspecialchars($employer['job_title']);
            mail($to, $subject, $email_message, "From: no-reply@jobwebsite.com");
        }
    }

    header('Location: ../View/available_jobs.php');
}
?>
