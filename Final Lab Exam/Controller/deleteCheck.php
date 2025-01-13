<?php
    require_once('../Model/employeeModel.php');

    if (isset($_POST['id'])) {
        $employeeID = $_POST['id'];

        $statusDelete = deleteEmployee($employeeID);
        if ($statusDelete) {
            echo "Success"; 
            exit;
        } else {
            echo "Error occurred while updating info. Please try again.";
            exit;
        }
    } else {
        echo "ERROR: Employee ID is required!";
    }
?>
