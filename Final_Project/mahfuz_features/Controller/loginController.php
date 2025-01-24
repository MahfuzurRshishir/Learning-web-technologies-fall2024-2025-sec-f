<?php
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = trim($data['username']);
    $password = trim($data['password']);
    $errors = [];

    if ($username === "") {
        $errors[] = "Username is required.";
    }
    if ($password === "") {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $user = getUserByUsernameAndPassword($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['usertype'];

            if ($user['usertype'] === 'User') {
                echo json_encode(["status" => "success", "redirect_url" => "user_homepage.php"]);
            } elseif ($user['usertype'] === 'Employee') {
                echo json_encode(["status" => "success", "redirect_url" => "employee_dashboard.php"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => implode('<br>', $errors)]);
    }
}
?>
