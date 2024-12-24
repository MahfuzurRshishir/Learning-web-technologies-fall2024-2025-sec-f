<html>
<head>
    <title>Insert user</title>
</head>
<body>
    <fieldset>
        <legend>Insert New User</legend>
        <form method="post" action="../controller/insertCheck.php" enctype="">
            Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id" value="" /> <br>
            Username:&nbsp; <input type="text" name="username" value="" /> <br>
            Password: &nbsp; <input type="text" name="password" value="" /> <br>
            Full Name: <input type="text" name="fullname" value="" /> <br>
            Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" name="email" value="" /> <br>
                    <input type="submit" name="submit" value="Add User" />
        </form>
        <a href="home.php">Back</a>
    </fieldset>

</body>
</html>

