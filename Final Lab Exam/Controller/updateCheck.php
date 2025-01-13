<?php
    require_once('../Model/employeeModel.php');

    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['contact']) && isset($_POST['password'])) {
        $employeeID = $_REQUEST['id'];
        $updatedName = $_POST['name'];
        $updatedUsername = $_POST['username'];
        $updatedContact = $_POST['contact'];
        $updatedPassword = $_POST['password'];

        $statusUpdate = updateEmployee($employeeID, $updatedName, $updatedUsername, $updatedContact, $updatedPassword);

        if ($statusUpdate) {
            echo "Success"; 
            exit;
        } else {
            echo "Error occurred while updating info. Please try again.";
            exit;
        }

    } else {
        echo "ERROR:All fields are required!";
        exit;
    }
?>
