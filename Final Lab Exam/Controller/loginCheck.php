<?php
    require_once('../Model/adminModel.php');

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $status = login($username, $password);

        if ($status) {
            setcookie('flag', 'true', time()+3600, '/');
            echo "Success"; 
            exit;
        } else {
            echo "Invalid Username or Password!. Please try again.";
            exit;
        }
    } else {
        echo "All fields are required!";
        exit;
    }
?>
