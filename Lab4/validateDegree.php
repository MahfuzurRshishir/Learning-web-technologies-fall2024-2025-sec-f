<?php
if (isset($_POST['submit'])) {
    if(isset($_POST['degrees'])){
        $degrees = $_POST['degrees'];
        $count = count($degrees);
        if(!($count>=2)){
            echo "Invalid input! <br> Please, select at least two degrees!";
        }else{
            echo "Valid input! <br> Your degrees are: ";
            foreach($degrees as $degree){
                echo $degree."&nbsp";

            }
        }

    }else{
        echo "No option selected!";
    }

}
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="Degree.html" enctype="">
        <input type="submit" name="return" value="Return" style="color: red;" />
</html>
