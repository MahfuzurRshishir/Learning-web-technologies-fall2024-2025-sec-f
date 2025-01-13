<?php
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'shop_management');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from admin where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

?>