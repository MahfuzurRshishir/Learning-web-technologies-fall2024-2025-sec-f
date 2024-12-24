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
            echo '<a href="../view/insert.php">Back</a>';
        }else {
            $status = addUser($id, $username, $password, $fullname, $email);
            if($status){
                echo "User Added Successfully! <br>";
                echo '<a href="../view/home.php">Home</a> | <a href="../view/userlist.php">View All Users</a>';

            }else{
                header('location: ../view/insert.php');
            }
        }
    }else{
        header('location: ../view/insert.php');
    }

?>