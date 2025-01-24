<?php
    session_start();
    require_once '../Model/userModel.php';

    $userId = $_SESSION['user_id'];

    $notifications = [
        ['message' => 'New job posted in your category!'],
        ['message' => 'Your application status has been updated.']
    ];

    echo json_encode($notifications);
?>
