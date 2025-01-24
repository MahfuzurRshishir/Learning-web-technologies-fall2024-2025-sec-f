<?php
require_once 'db.php';

function createAlert($recipient_id, $type, $message) {
    $conn = db();
    $sql = "INSERT INTO shish_notifications (recipient_id, type, message, created_at) 
            VALUES ($recipient_id, '$type', '$message', NOW())";
    return mysqli_query($conn, $sql);
}

function getEmployeeAlerts($employee_id) {
    $conn = db();
    $sql = "SELECT * FROM shish_notifications WHERE recipient_id = $employee_id AND type = 'job_applied'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getUserAlerts($user_id) {
    $conn = db();
    $sql = "SELECT * FROM shish_notifications WHERE recipient_id = $user_id AND type = 'job_posted'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
