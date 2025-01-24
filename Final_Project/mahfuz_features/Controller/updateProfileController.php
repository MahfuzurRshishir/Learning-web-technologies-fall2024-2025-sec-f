<?php
session_start();
require_once '../Model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $errors = [];

    $errors = [];

    $allowed_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i = 0; $i < strlen($fullname); $i++) {
        if (strpos($allowed_chars, $fullname[$i]) === false) {
            $errors[] = "Full name can only contain letters and spaces.";
            break;
        }
    }
    
    if ($gender !== "Male" && $gender !== "Female" && $gender !== "Other") {
        $errors[] = "Invalid gender.";
    }
    
    $phone_is_numeric = true;
    for ($i = 0; $i < strlen($phone); $i++) {
        if ($phone[$i] < '0' || $phone[$i] > '9') {
            $phone_is_numeric = false;
            break;
        }
    }
    if (!$phone_is_numeric || strlen($phone) < 10 || strlen($phone) > 15) {
        $errors[] = "Invalid phone number.";
    }
    
    $is_address_empty = true;
    for ($i = 0; $i < strlen($address); $i++) {
        if ($address[$i] !== " " && $address[$i] !== "\t" && $address[$i] !== "\n") {
            $is_address_empty = false;
            break;
        }
    }
    if ($is_address_empty) {
        $errors[] = "Address is required.";
    }
    

    $profilepic = $_FILES['profilepic'];
    if ($profilepic['name'] !== "") {
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($profilepic['type'], $allowedTypes)) {
            $errors[] = "Profile picture must be a JPG or PNG file.";
        } elseif ($profilepic['size'] > 2 * 1024 * 1024) {
            $errors[] = "Profile picture must be less than 2MB.";
        } else {
            $targetPath = "../uploads/profile_pics/" . $_SESSION['user_id'] . "_" . basename($profilepic['name']);
            move_uploaded_file($profilepic['tmp_name'], $targetPath);
        }
    }

    if (empty($errors)) {
        updateProfile($_SESSION['user_id'], $fullname, $gender, $phone, $address, $targetPath ?? null);
        header('Location: ../View/profile.php');
    } else {
        echo implode('<br>', $errors);
    }
}
?>
