<?php
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = trim($data['username']);
    $fullname = trim($data['fullname']);
    $email = trim($data['email']);
    $password = trim($data['password']);
    $usertype = trim($data['usertype']);
    $errors = [];

    if ($username === "") $errors[] = "Username is required.";
    if ($fullname === "") $errors[] = "Full name is required.";
    if ($email === "" || !strpos($email, '@')) $errors[] = "Valid email is required.";
    if ($password === "") $errors[] = "Password is required.";
    if ($usertype !== "User" && $usertype !== "Employee") $errors[] = "Invalid user type.";

    if (empty($errors)) {
        if (createUser($username, $fullname, $email, $password, $usertype)) {
            echo json_encode(["status" => "success", "redirect_url" => "login.php"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: Could not create account."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
