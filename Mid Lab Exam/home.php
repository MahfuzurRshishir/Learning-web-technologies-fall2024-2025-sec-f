<?php
    session_start();
    if(isset($_SESSION['flag'])){
        $logged_name = $_SESSION['logged_user']['username'];
        $logged_email =
        $logged_userName =
        $logged_pass =
        
?>

<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
        <h1>Welcome Home! <?php echo $?></h1>

        <a href="logout.php">logout</a>
</body>
</html>

<?php
    }else{
        header('location: login.html'); 
    }
?>

