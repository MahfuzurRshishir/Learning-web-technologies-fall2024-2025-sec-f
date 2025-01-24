<?php
    require_once 'db.php';

    function getUserByEmailAndPassword($email, $password) {
        global $conn;
        $query = "SELECT * FROM nowshin_users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    function createUser($name, $email, $password, $role) {
        global $conn;
        $query = "INSERT INTO nowshin_users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        return mysqli_query($conn, $query);
    }

    function updatePassword($email, $newPassword) {
        global $conn;
        $query = "UPDATE nowshin_users SET password = '$newPassword' WHERE email = '$email'";
        return mysqli_query($conn, $query);
    }

    function checkIfEmailExists($email) {
        global $conn;
        $query = "SELECT id FROM nowshin_users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result) > 0; 
    }
    function getUserNameById($userId) {
        global $conn;
        $query = "SELECT name FROM nowshin_users WHERE id = '$userId'";
        $result = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['name'];
        }
        return "Unknown User";
    }
?>
