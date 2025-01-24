<?php
require_once '../Model/userModel.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];

    
    if ($email == "") $errors[] = "Email is required.";
    if ($password == "") $errors[] = "Password is required.";

    if (count($errors) == 0) {
        $user = getUserByEmailAndPassword($email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            header('Location: ../View/homepage.php');
            exit();
        } else {
            $errors[] = "Invalid email or password.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
