<?php
session_start();
require_once '../Model/salaryModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'add') {
        $job_title = trim($_POST['job_title']);
        $location = trim($_POST['location']);
        $min_salary = trim($_POST['min_salary']);
        $max_salary = trim($_POST['max_salary']);
        $employee_id = $_SESSION['user_id'];

        $errors = [];
        if ($job_title === "") $errors[] = "Job title is required.";
        if ($location === "") $errors[] = "Location is required.";
        if (!is_numeric($min_salary) || $min_salary <= 0) $errors[] = "Valid minimum salary is required.";
        if (!is_numeric($max_salary) || $max_salary <= $min_salary) $errors[] = "Maximum salary must be greater than minimum salary.";

        if (empty($errors)) {
            if (addSalary($job_title, $location, $min_salary, $max_salary, $employee_id)) {
                header('Location: ../View/manage_salaries.php');
            } else {
                echo "Error: " . mysqli_error(db());
            }
        } else {
            echo implode('<br>', $errors);
        }
    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $job_title = trim($_POST['job_title']);
        $location = trim($_POST['location']);
        $min_salary = trim($_POST['min_salary']);
        $max_salary = trim($_POST['max_salary']);

        $errors = [];
        if ($job_title === "") $errors[] = "Job title is required.";
        if ($location === "") $errors[] = "Location is required.";
        if (!is_numeric($min_salary) || $min_salary <= 0) $errors[] = "Valid minimum salary is required.";
        if (!is_numeric($max_salary) || $max_salary <= $min_salary) $errors[] = "Maximum salary must be greater than minimum salary.";

        if (empty($errors)) {
            if (updateSalary($id, $job_title, $location, $min_salary, $max_salary)) {
                header('Location: ../View/manage_salaries.php');
            } else {
                echo "Error: " . mysqli_error(db());
            }
        } else {
            echo implode('<br>', $errors);
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? null;

        if ($id) {
            if (deleteSalary($id)) {
                echo json_encode(["status" => "success", "message" => "Salary deleted successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error deleting salary."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid salary ID."]);
        }
    }
}
?>
