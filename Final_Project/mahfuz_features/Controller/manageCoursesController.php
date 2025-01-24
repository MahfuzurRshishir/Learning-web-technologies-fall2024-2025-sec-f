<?php
session_start();
require_once '../Model/courseModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'publish') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $start_date = trim($_POST['start_date']);
        $end_date = trim($_POST['end_date']);
        $publisher_id = $_SESSION['user_id'];

        $errors = [];
        if ($title === "") $errors[] = "Course title is required.";
        if ($description === "") $errors[] = "Course description is required.";
        if ($start_date === "" || $end_date === "") $errors[] = "Start and end dates are required.";
        if ($start_date > $end_date) $errors[] = "Start date must be before end date.";

        if (empty($errors)) {
            publishCourse($title, $description, $start_date, $end_date, $publisher_id);
            header('Location: ../View/manage_courses.php');
        } else {
            echo implode('<br>', $errors);
        }
    } elseif ($action === 'delete') {
        $course_id = $_POST['course_id'] ?? null;

        if ($course_id) {
            deleteCourse($course_id);
            header('Location: ../View/manage_courses.php');
        } else {
            echo "Invalid course ID.";
        }
    }
}
?>
