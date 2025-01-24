<?php
require_once '../Model/jobModel.php';
session_start();

$employeeId = $_SESSION['user_id'];
$jobs = getJobsByEmployee($employeeId);

echo json_encode($jobs);
?>
