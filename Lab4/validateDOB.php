<?php
if (isset($_POST['submit'])) {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if((is_numeric($day)==false|| is_numeric($month)==false || is_numeric($year)==false)){
        echo "Invalid input: Give numeric values!";

    }else{
        if(!($day>=1 && $day<=31)){
            echo "Invalid input: Give valid input of day!";
        }else if(!($month>=1 && $month<=12)){
            echo "Invalid input: Give valid input of month!";
        }else if(!($year>=1953 && $year<=1998)){
            echo "Invalid input: Give valid input of year!";
        }
    }

}
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="DateOfBirth.html" enctype="">
        <input type="submit" name="return" value="Return" style="color: red;" />
</html>
