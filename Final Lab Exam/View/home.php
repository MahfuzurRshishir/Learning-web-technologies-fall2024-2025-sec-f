<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <fieldset id="homeF">
        <h2>Welcome Home Admin</h2>
        <legend>Home Page</legend>
        <form action="../View/register.html">
            <input type="submit" name="register" value="Register New">
        </form>
        <form action="../View/viewEmployee.php">
            <input type="submit" name="viewEmployee" value="View Employees">
        </form>
        <form action="../View/search.html">
            <input type="submit" name="search" value="Search Employee">
        </form>
        <a href="../Controller/logout.php"> Logout</a>
    </fieldset>
    
</body>
</html>