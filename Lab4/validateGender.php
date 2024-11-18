<?php
if (isset($_POST['submit'])) {
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        echo "Your Gender is: ".$gender;
    }else{
        echo "Please, select on option!";
    }

}
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="Gender.html" enctype="">
        <input type="submit" name="return" value="Return" style="color: red;" />
</html>
