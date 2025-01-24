<?php
require_once '../Model/applicationModel.php';
session_start();

$userId = $_SESSION['user_id'];

$applications = getApplicationsByUser($userId);

echo json_encode($applications);
?>
