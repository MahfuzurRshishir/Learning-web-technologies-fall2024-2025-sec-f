<?php
session_start();
require_once '../Model/courseModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'apply') {
        $course_id = $_POST['course_id'];
        $user_id = $_SESSION['user_id'];
        $application_date = date('Y-m-d H:i:s');

        applyForCourse($course_id, $user_id, $application_date);
        header('Location: ../View/upcoming_courses.php');
    }
}
?>
