<?php
    session_start();

    if(isset($_POST['submit'])){

        $username  =  trim($_REQUEST['username']);
        $password  =  trim($_REQUEST['password']);

        if(empty($username) || empty($password) )
        {
            header('location: login.html');

        }else if (isset($_SESSION['users'])) {
            $users = $_SESSION['users'];
            $is_valid_user = false;

            foreach ($users as $user) {
                if ($user['username'] == $username && $user['password'] == $password) {
                    $is_valid_user = true;
                    $_SESSION['logged_user']=$user;
                    break;
                }
            }
            if ($is_valid_user) {
                $_SESSION['flag'] = true;
                header('location: home.php');
                exit;
            } else {
                echo "Invalid username or password.";
            }
        }else{
            echo "No users registered yet. Please register first.";
        }
    }else if(isset($_POST['sign-in'])){
        header('location: registration.html');
    }else{
        //echo "Invalid request!";
        header('location: login.html');
    }

?>