<?php
    session_start();

    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = array();
    }

    if(isset($_POST['register'])){

        $name  =  trim($_REQUEST['name']);
        $email  =  trim($_REQUEST['email']);
        $username  =  trim($_REQUEST['username']);
        $password  =  trim($_REQUEST['password']);

        if(empty($username) || empty($password)  || empty($name) || empty($email) ){
            header('location: registration.html');
        }else{
            $user = array("name"=>$name, "email"=>$email, "username"=>$username, "password"=>$password);
            $_SESSION['users'][] = $user;
            header('location: login.html');
        }
    }else if(isset($_POST['back'])){
        header('location: login.html');
    }else{
        header('location: registration.html');
    }
?>