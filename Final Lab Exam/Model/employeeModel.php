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

    function addUser($name, $contact, $username, $password){
        $con = getConnection();
        $sql = "INSERT INTO employees (name, contact, username, password) VALUES ('{$name}', '{$contact}', '{$username}', '{$password}')";
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
        $conn->close();
    }

    function getAllEmployee(){
        $con = getConnection();
        $sql = "select * from employees";
        $result = mysqli_query($con, $sql);
        $users = [];
    
        while($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
    
        return $users;
    }

    function getEmployee($employeeID){
        $con = getConnection();
        $sql = "select * from employees where id='{$employeeID}'";
        $result = mysqli_query($con, $sql);
        $employee =  mysqli_fetch_assoc($result);

        return $employee;
    }

    function searchEmployee($usernameOrName){
        $con = getConnection();
        $sql = "SELECT * FROM employees WHERE name LIKE '{$usernameOrName}' OR username LIKE '{$usernameOrName}'";
        $result = mysqli_query($con, $sql);

        $employee =[];

        while($row = mysqli_fetch_assoc($result)){
            $employee[] = $row;
        }
        return $employee;

    }

    function updateEmployee($id, $name, $username, $contact, $password){
        $con = getConnection();
        $sql = "UPDATE employees SET name='$name', contact='$contact', username='$username', password='$password' WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function deleteEmployee($employeeID){
        $con = getConnection();
        $sql = "DELETE FROM employees WHERE id=$employeeID";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }else{
            return false;
        }
    }
?>