<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_COOKIE['flag'])){   
        if (isset($_REQUEST['username'])) {
            $username = $_REQUEST['username'];
           $user= getUser($username);
        }else{
            header('location: userlist.php'); 
        }
?>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <fieldset>
        <legend> Remove User </legend>
       <p>User's Information:</p>
        <table border="1">
            <tr>
                 <th>ID</th>
                 <th>Username</th>
                 <th>Full Name</th>
                 <th>Email</th>
            </tr>
            <tr>
                 <td><?php echo $user['id']; ?></td>
                 <td><?php echo $user['username']; ?></td>
                 <td><?php echo $user['fullname']; ?></td>
                 <td><?php echo $user['email']; ?></td>
            </tr>
        </table>
        <form method="post" action="../Controller/deleteCheck.php?id=<?php echo $user['id']; ?>" enctype="">
        <p>Do you want to delete this user? 
        <input type="submit" name="delete" value="Delete" /><br>
        <a href="userlist.php">Back</a> 

    </fieldset>
</body>
</html>

<?php
    }else{
        header('location: userlist.php'); 
    }
?>