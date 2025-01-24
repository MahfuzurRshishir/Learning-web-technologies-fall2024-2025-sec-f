<?php
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $newPassword = trim($_POST['new_password']);
    $errors = [];

    if ($email == "") {
        $errors[] = "Email is required.";
    } elseif (!strpos($email, '@') || !strpos($email, '.')) {
        $errors[] = "Invalid email format.";
    } elseif (strpos($email, ' ')) {
        $errors[] = "Email cannot contain spaces.";
    } elseif (!checkIfEmailExists($email)) { 
        $errors[] = "This email is not registered.";
    }

    if ($newPassword == "") {
        $errors[] = "New password is required.";
    } elseif (strlen($newPassword) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    } elseif (!ctype_alnum($newPassword)) {
        $errors[] = "Password must be alphanumeric.";
    }

    if (count($errors) == 0) {
        if (updatePassword($email, $newPassword)) {
            echo "Password reset successfully!";
        } else {
            echo "Error resetting password!";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
