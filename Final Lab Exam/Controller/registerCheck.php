<?php
    require_once('../Model/employeeModel.php');

    if (isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['username']) && isset($_POST['password'])) {
        $name = trim($_POST['name']);
        $contact = trim($_POST['contact']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $status = addUser($name, $contact, $username, $password);

        if ($status) {
            echo "Success"; 
            exit;
        } else {
            echo "Error occurred during registration. Please try again.";
            exit;
        }
    } else {
        echo "All fields are required!";
        exit;
    }
?>
