<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    function ifLetter($name) {
        for ($i = 0; $i < strlen($name); $i++) {
            // Check if character is not a letter, period, or dash
            if (!((($name[$i] >= 'a' && $name[$i] <= 'z') || ($name[$i] >= 'A' && $name[$i] <= 'Z')) || $name[$i] == '.' || $name[$i] == '-')) {
                return false;
            }
        }
        return true;
    }

    if ($name == null) {
        echo "Name cannot be empty!";
    } else if (strlen($name) < 2) {
        echo "Name must contain at least two characters!";
    } else if (!(($name[0] >= 'a' && $name[0] <= 'z') || ($name[0] >= 'A' && $name[0] <= 'Z'))) {
        echo "Name should start with a letter!";
    } else if (!ifLetter($name)) {
        echo "Invalid Name!";
    } else {
        echo "Valid Name found!";
    }
}
?>
