<?php
    session_start();
    require_once('../model/userModel.php');
    if (isset($_REQUEST['delete'])) {
        $id= $_REQUEST['id'];
        $status=deleteUser($id);

        if($status){
            echo "Successfully deleted the user! <br>";
            echo '<a href="../view/home.php">Home</a> | <a href="../view/userlist.php">View All Users</a>';
        }else{
            header('location: ../view/delete.php');
        }
    }else{
        header('location: ../view/delete.php'); 
    }
?>