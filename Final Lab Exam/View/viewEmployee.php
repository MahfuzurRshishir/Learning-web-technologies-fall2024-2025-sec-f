<?php
    require_once('../Model/employeeModel.php');

    $employees = getAllEmployee();

    
    ?>
    <html>
    <head>
        <title>Current Employees</title>
    </head>
    <body>
        <fieldset>
            <legend>Current Employees</legend>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>CONTACT</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                    if (!empty($employees)) {
                        for ($i = 0; $i < count($employees); $i++) {
                    ?>
                            <tr>
                                <td><?php echo $employees[$i]['id']; ?></td>
                                <td><?php echo $employees[$i]['name']; ?></td>
                                <td><?php echo $employees[$i]['contact']; ?></td>
                                <td><?php echo $employees[$i]['username']; ?></td>
                                <td><?php echo $employees[$i]['password']; ?></td>

                                <td>             
                                    <a href="../View/update.php?employeeID=<?php echo $employees[$i]['id']; ?>">UPDATE</a> 
                                    <a href="../View/delete.php?employeeID=<?php echo $employees[$i]['id']; ?>">DELETE</a> 

                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No employee found at this moment</td></tr>";
                    }
                    ?>
                </table>
                <a href="../View/home.php">Back</a> |
                <a href="../Controller/logout.php">Logout</a>
                
        </fieldset>

    </body>
    </html>
<?php
?>
