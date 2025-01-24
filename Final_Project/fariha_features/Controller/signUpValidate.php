<?php
require_once '../Model/userModel.php';

$data = json_decode(file_get_contents('php://input'), true);

$name = isset($data['name']) ? trim($data['name']) : null;
$email = isset($data['email']) ? trim($data['email']) : null;
$password = isset($data['password']) ? trim($data['password']) : null;
$role = isset($data['role']) ? trim($data['role']) : null;

$errors = [];

if (empty($name)) {
    $errors[] = "Name is required.";
}
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}
if (empty($password)) {
    $errors[] = "Password is required.";
}
if (empty($role)) {
    $errors[] = "Role selection is required.";
}

if (count($errors) === 0) {
    if (createUser($name, $email, $password, $role)) {
        echo "Sign-up successful!";
    } else {
        echo "Error: Could not create user.";
    }
} else {
    echo implode('<br>', $errors);
}
?>
