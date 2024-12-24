<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($id, $username, $password, $fullname, $email){
        $con = getConnection();
        $sql = "insert into users VALUES('{$id}', '{$username}', '{$password}','{$fullname}', '{$email}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function getUser($username){
        $con = getConnection();
        $sql = "select * from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
    
        return $user;

    }

    function getAllUser(){
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);
        $users = [];
    
        while($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
    
        return $users;
    }

    function updateUser($id, $updated_info) {
        $con = getConnection();
        $sql = "UPDATE users SET 
                username = '{$updated_info['username']}', 
                password = '{$updated_info['password']}', 
                fullname = '{$updated_info['fullname']}', 
                email = '{$updated_info['email']}' 
                WHERE id = '{$id}'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    

    function deleteUser($id){
        $con = getConnection();
        $sql = "delete from users where id='{$id}'";
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    //this getFullname not yet used but can be used if needed 
    function getFullname($username){
        $con = getConnection();
        $sql = "select fullname from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count==1){
            $row = mysqli_fetch_assoc($result); 
            $fullname=$row['fullname'];
            return $fullname;
        }else{
            echo "error finding full name!";
        }
    }
?>