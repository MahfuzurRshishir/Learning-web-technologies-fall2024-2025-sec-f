<?php
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $otp = trim($data['otp']);
    $email = $_SESSION['email'] ?? null;
    $errors = [];

    if ($otp === "") {
        $errors[] = "OTP is required.";
    }

    if (empty($errors)) {
        if (verifyOtp($email, $otp)) {
            echo json_encode(["status" => "success", "redirect_url" => "reset_password.php"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid or expired OTP."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
