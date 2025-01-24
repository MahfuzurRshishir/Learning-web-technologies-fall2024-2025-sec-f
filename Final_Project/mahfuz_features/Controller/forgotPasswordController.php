<?php
require_once '../Model/userModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = trim($data['email']);
    $errors = [];

    if ($email === "" || !strpos($email, '@')) {
        $errors[] = "Valid email is required.";
    }

    if (empty($errors)) {
        $otp = generateOtp();
        $expiry = date('Y-m-d H:i:s', strtotime('+15 minutes'));

        if (setOtpForUser($email, $otp, $expiry)) {
            mail($email, "Your OTP", "Your OTP is: $otp. It expires in 15 minutes.", "From: hulululu706@gmail.com");
            echo json_encode(["status" => "success", "message" => "OTP sent to your email."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Email not found."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
