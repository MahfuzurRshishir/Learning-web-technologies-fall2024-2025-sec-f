<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_COOKIE['flag'])){   
        if (isset($_REQUEST['username'])) {
            $username = $_REQUEST['username'];
           $user= getUser($username);
        }
?>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <fieldset>
        <legend> Edit Information </legend>
        <form method="post" action="update.php?id=<?php echo $user['id']; ?>" enctype="">
            Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" /> <br>
            Password: <input type="text" name="password" value="<?php echo $user['password']; ?>" /> <br>
            Full Name:<input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" /> <br>
            Email   : <input type="email" name="email" value="<?php echo $user['email']; ?>" /> <br>
                      <input type="submit" name="submit" value="Update" />
                      <a href="userlist.php">Back</a> 

        </form>
    </fieldset>
</body>
</html>

<?php
    }else{
        header('location: userlist.php'); 
    }
?>