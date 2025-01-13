<?php
    require_once('../Model/employeeModel.php');
    $employeeID = $_REQUEST['employeeID'];

    $employee = getEmployee($employeeID);
?>

<html>
    <head>
        <title> Delete Employee</title>    
    </head>
    <body>
        <div id="deleteDiv">
            <fieldset>
            <legend> Remove Employee </legend>
                <p>Employee's Information:</p>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Username</th>
                        <th>CONTACT</th>
                    </tr>
                    <tr>
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['username']; ?></td>
                        <td><?php echo $employee['contact']; ?></td>
                    </tr>
                </table>
                <h5 id="deleteMessage"></h5>
                <p>Do you want to delete this user? 
                <input type="submit" value="Delete" onclick="deleteCheck()"><br>
                <a href="../View/viewEmployee.php">Cancel</a> |
                <a href="../Controller/logout.php">Logout</a>
            </fieldset>
        </div>

        <script>
            function deleteCheck() {
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/deleteCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('id=' + <?php echo $employee['id']; ?>);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        if (this.responseText.trim() === "Success") {
                            alert("Successfully deleted!")
                            window.location.href = "../View/viewEmployee.php";
                        } else {
                            document.getElementById('deleteMessage').innerHTML = this.responseText;
                            document.getElementById('deleteMessage').style.color = "red";
                        }
                    }
                };
            }
        </script>
    </body>
</html>