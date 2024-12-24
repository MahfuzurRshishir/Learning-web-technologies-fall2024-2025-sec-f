<?php
    session_start();
    require_once('../model/userModel.php');

    if (isset($_POST['submit'])) {
        $id=$_REQUEST['id'];

        $new_username  =  trim($_REQUEST['username']);
        $new_password  =  trim($_REQUEST['password']);
        $new_fullname  =  trim($_REQUEST['fullname']);
        $new_email =  trim($_REQUEST['email']);


        if($new_username == null || empty($new_password) || empty($new_fullname) || empty($new_email)){
            echo "Null data found! <br>";
            echo '<a href="../view/edit.php">Back</a>';

        }else{
            $updated_info =['username' => $new_username,
                            'password' => $new_password, 
                            'fullname' => $new_fullname, 
                            'email'=> $new_email
                        ];
            $status=updateUser($id, $updated_info);
            if($status){
                echo "Successfully Updated your information! <br>";
                echo '<a href="../view/userlist.php">Back</a>';

            }else{
                echo "Can't Update your Information! <br>";
                echo '<a href="../view/userlist.php">Back</a>';
            }
          
        }
    }
?>
