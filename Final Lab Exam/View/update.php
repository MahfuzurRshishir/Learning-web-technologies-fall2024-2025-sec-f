<?php
    require_once('../Model/employeeModel.php');
    $employeeID = $_REQUEST['employeeID'];

    $employee = getEmployee($employeeID);

?>
<html>
    <head>
        <title>Update Employee</title>
    </head>
    <body>
        <fieldset>
            <legend>Update Employee Information </legend>
                Employee name: <br>
                <input type="text" id="updateName" value="<?php echo $employee['name'];?>"><br>
                Employee Username: <br>
                <input type="text" id="updateUsername" value="<?php echo $employee['username'];?>"><br>
                Contact Number:<br> 
                <input type="text" id="updateContact" value="<?php echo $employee['contact'];?>"><br>
                Password: <br>
                <input type="text" id="updatePassword" value="<?php echo $employee['password'];?>"><br>
                <h5 id="updateMessage"></h5>
                <input type="submit" value="Update" onclick="updateCheck()"> <br>
                <a href="../View/viewEmployee.php">Cancel</a> |
                <a href="../Controller/logout.php">Logout</a>

        </fieldset>

        <script>
        function updateCheck() {
            let name = document.getElementById('updateName').value;
            let contact = document.getElementById('updateContact').value;
            let username = document.getElementById('updateUsername').value;
            let password = document.getElementById('updatePassword').value;

            if (name === "" || contact === "" || username === "" || password === "") {
                document.getElementById('updateMessage').innerHTML = "All fields are required!";
                document.getElementById('updateMessage').style.color = "red";
                return;
            }

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../Controller/updateCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('id=' + <?php echo $employee['id']; ?> + '&name=' + name + '&contact=' + contact + '&username=' + username + '&password=' + password);

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if (this.responseText.trim() === "Success") {
                        alert("Succesfully updated information!");
                        window.location.href = "../View/viewEmployee.php";
                    } else {
                        alert("Unsuccessful!");
                        document.getElementById('updateMessage').innerHTML = this.responseText;
                        document.getElementById('updateMessage').style.color = "red";
                    }
                }
            };
        }
    </script>
    </body>
</html>