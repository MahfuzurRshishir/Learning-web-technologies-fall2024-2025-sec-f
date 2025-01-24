<?php
require_once '../Model/alertModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'create') {
        $recipient_id = $_POST['recipient_id'];
        $type = $_POST['type'];
        $message = $_POST['message'];
        createAlert($recipient_id, $type, $message);
        echo json_encode(["status" => "success"]);
    }
}
?>
