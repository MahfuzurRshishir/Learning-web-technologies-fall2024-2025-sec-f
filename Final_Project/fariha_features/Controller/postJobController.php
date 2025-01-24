<?php
require_once '../Model/jobModel.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $employeeId = $_SESSION['user_id'];
    $filePath = null;
    $errors = [];

    if ($title == "") {
        $errors[] = "Job title is required.";
    }
    if ($description == "") {
        $errors[] = "Job description is required.";
    }

    if (!empty($_FILES['file']['name'])) {
        $targetDir = "../uploads/circular";
        $filePath = $targetDir . basename($_FILES['file']['name']);
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $errors[] = "Failed to upload file.";
        }
    }

    if (count($errors) == 0) {
        if (createJob($employeeId, $title, $description, $filePath)) {
            echo "Job posted successfully!";
        } else {
            echo "Error posting job.";
        }
    } else {
        echo json_encode($errors); 
    }
}
?>
