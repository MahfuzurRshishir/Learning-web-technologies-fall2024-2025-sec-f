<?php
    require_once('../model/userModel.php');
    if(isset($_POST['submit'])){
        $id  =  trim($_REQUEST['id']);
        $username  =  trim($_REQUEST['username']);
        $password  =  trim($_REQUEST['password']);
        $fullname  =  trim($_REQUEST['fullname']);
        $email  =  trim($_REQUEST['email']);

        if($id == null || empty($username) || empty($password) || empty($fullname)|| empty($email) ){
            echo "Null data found! <br>";
            echo '<a href="../view/signup.html">Back</a>';
        }else {
            $status = addUser($id, $username, $password, $fullname, $email);
            if($status){
                echo "User Added Successfully! <br>";
                echo '<a href="../view/login.html">Back to Login</a>';

            }else{
                header('location: ../view/signup.html');
            }
        }
    }else{
        header('location: ../view/signup.html');
    }

?>