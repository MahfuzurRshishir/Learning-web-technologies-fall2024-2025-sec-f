<?php
require_once '../Model/salaryModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $job_title = trim($data['job_title']);
    $location = trim($data['location']);
    $errors = [];

    if ($job_title === "") {
        $errors[] = "Job title is required.";
    }
    if ($location === "") {
        $errors[] = "Location is required.";
    }

    if (empty($errors)) {
        $salaries = searchSalaries($job_title, $location);
        if (!empty($salaries)) {
            echo json_encode(["status" => "success", "data" => $salaries]);
        } else {
            echo json_encode(["status" => "error", "message" => "No matching salaries found."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
