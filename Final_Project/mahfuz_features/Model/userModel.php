<?php
    require_once '../Model/db.php';

    function getUserByUsernameAndPassword($username, $password) {
        $conn = db();
        $query = "SELECT * FROM shish_users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn,$query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    function createUser($username, $fullname, $email, $password, $usertype) {
        $conn = db();
        $query = "INSERT INTO shish_users (username, fullname, email, password, usertype) 
                VALUES ('$username', '$fullname', '$email', '$password', '$usertype')";
        return $conn->query($query);
    }


    function setOtpForUser($email, $otp, $expiry) {
        $conn = db();
        $sql = "UPDATE shish_users SET otp = '$otp', otp_expiry = '$expiry' WHERE email = '$email'";
        return mysqli_query($conn, $sql);
    }
    

    function generateOtp() {
        return rand(100000, 999999);
    }

    function verifyOtp($email, $otp) {
        $conn = db();
        $sql = "SELECT otp, otp_expiry FROM shish_users WHERE email = '$email' AND otp = '$otp'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_time = date('Y-m-d H:i:s');
            if ($current_time <= $row['otp_expiry']) {
                return true;
            }
        }
        return false;
    }
    function updatePassword($email, $new_password) {
        $conn = db();
        $sql = "UPDATE shish_users SET password = '$new_password', otp = NULL, otp_expiry = NULL WHERE email = '$email'";
        return $conn->query($sql);
    }

    function getUserById($id) {
        $conn = db();
        $sql = "SELECT * FROM shish_users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    function updateProfile($id, $fullname, $gender, $phone, $address, $profilepicpath = null) {
        $conn = db();
        $sql = "UPDATE shish_users SET fullname = '$fullname', gender = '$gender', phone = '$phone', address = '$address'";
        if ($profilepicpath) {
            $sql .= ", profilepicpath = '$profilepicpath'";
        }
        $sql .= " WHERE id = $id";
        mysqli_query($conn, $sql);
    }
?>
