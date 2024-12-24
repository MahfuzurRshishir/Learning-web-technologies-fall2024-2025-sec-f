<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_COOKIE['flag'])){
        $username = $_SESSION['username'];
        $user= getUser($username);
?>

<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <fieldset>
        <legend>HOME</legend>
        <h1>Welcome Home! <?php echo $user['fullname'];?></h1>

        <h4>Here's your information:</h4>
        <p>Id       : <?php echo $user['id'];?><br>
           User Name: <?php echo $user['username'];?><br> 
           Full Name: <?php echo $user['fullname'];?><br>
           Email    : <?php echo $user['email'];?><br><br>

        <a href="userlist.php">View All Users</a> |
        <a href="../controller/logout.php">logout</a> |
        <a href="insert.php">Add User</a>
    </fieldset>

</body>
</html>

<?php
    }else{
        header('location: login.html'); 
    }
?>

