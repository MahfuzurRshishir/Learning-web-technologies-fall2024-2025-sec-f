<?php
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $new_password = trim($data['new_password']);
    $confirm_password = trim($data['confirm_password']);
    $email = $_SESSION['email'] ?? null; 
    $errors = [];

    if ($new_password === "") $errors[] = "New password is required.";
    if ($confirm_password === "") $errors[] = "Confirm password is required.";
    if ($new_password !== $confirm_password) $errors[] = "Passwords do not match.";

    if (empty($errors)) {
        if (updatePassword($email, $new_password)) {
            echo json_encode(["status" => "success", "redirect_url" => "login.php"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: Could not reset password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
