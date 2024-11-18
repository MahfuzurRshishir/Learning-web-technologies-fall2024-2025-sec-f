<?php
if (isset($_POST['submit'])) {
    if(isset($_POST['bloodGroup'])){
        $bloodGroup = $_POST['bloodGroup'];
        echo "Valid input! <br> Your Blood Group is: ".$bloodGroup;
    }else{
        echo "Invalid! <br> Please, select your blood group!";
    }

}
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="BloodGroup.html" enctype="">
        <input type="submit" name="return" value="Return" style="color: red;" />
</html>
