<?php
    session_start();
    require_once('../model/userModel.php');
    //include_once('../model/userModel.php');

    if (isset($_COOKIE['flag'])) {
        $users = getAllUser();
    ?>
        <head>
            <title>User List</title>
        </head>
        <body>
            <fieldset>
                <legend>USER LIST</legend>
                    <table border="2">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if (!empty($users)) {
                            for ($i = 0; $i < count($users); $i++) {
                        ?>
                                <tr>
                                    <td><?php echo $users[$i]['id']; ?></td>
                                    <td><?php echo $users[$i]['username']; ?></td>
                                    <td><?php echo $users[$i]['fullname']; ?></td>
                                    <td><?php echo $users[$i]['email']; ?></td>
                                    <td>             
                                        <a href="edit.php?username=<?php echo $users[$i]['username']; ?>">EDIT</a> 
                                        <a href="delete.php?username=<?php echo $users[$i]['username']; ?>">DELETE</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>No users found</td></tr>";
                        }
                        ?>
                    </table>
                    <a href="home.php">Back</a> |
                    <a href="../Controller/logout.php">Logout</a>
                    
            </fieldset>

        </body>
        </html>
    <?php
    } else {
        header('location: login.html');
    }
?>
