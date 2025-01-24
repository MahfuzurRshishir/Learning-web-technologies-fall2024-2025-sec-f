<?php
session_start();
require_once '../Model/jobModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'post') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $location = trim($_POST['location']);
        $min_salary = trim($_POST['min_salary']);
        $max_salary = trim($_POST['max_salary']);
        $employer_id = $_SESSION['user_id'];

        $errors = [];
        if ($title === "") $errors[] = "Job title is required.";
        if ($description === "") $errors[] = "Job description is required.";
        if ($location === "") $errors[] = "Location is required.";
        if (!is_numeric($min_salary) || $min_salary <= 0) $errors[] = "Valid minimum salary is required.";
        if (!is_numeric($max_salary) || $max_salary <= $min_salary) $errors[] = "Maximum salary must be greater than minimum salary.";

        if (empty($errors)) {
            postJob($title, $description, $location, $min_salary, $max_salary, $employer_id);
            header('Location: ../View/manage_jobs.php');
        } else {
            echo implode('<br>', $errors);
        }
    } elseif ($action === 'delete') {
        $job_id = $_POST['job_id'] ?? null;

        if ($job_id) {
            deleteJob($job_id);
            echo json_encode(["status" => "success", "message" => "Job deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid job ID."]);
        }
    }
}
?>
