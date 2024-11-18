<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];


    function is_email($email) {
        // Check if the input contains exactly one '@' character
        $at_count = 0;
        for ($i = 0; $i < strlen($email); $i++) {
            if ($email[$i] === '@') {
                $at_count++;
            }
        }
        // If there's not exactly one '@', it's not a valid email
        if ($at_count != 1) {
            return false;
        }

        // Split the string into local part and domain part based on '@'
        $at_index = strpos($email, '@');
        $local_part = substr($email, 0, $at_index);
        $domain_part = substr($email, $at_index + 1);

        // Ensure both the local and domain parts are not empty
        if (empty($local_part) || empty($domain_part)) {
            return false;
        }

        // Check if the domain part contains at least one '.'
        $dot_index = -1;
        for ($i = 0; $i < strlen($domain_part); $i++) {
        if ($domain_part[$i] === '.') {
            $dot_index = $i;
            break;
        }
        }

        // If there's no '.' or it's at the start or end of the domain part
        if ($dot_index == -1 || $dot_index == 0 || $dot_index == strlen($domain_part) - 1) {
            return false;
        }

        //Ensure the domain extension is at least 2 characters long
        if (strlen(substr($domain_part, $dot_index + 1)) < 2) {
            return false;
        }

        return true;
        }

    if ($email == null) {
        echo " No email found!";
    }else if(!is_email($email)){
        echo "Invalid email";
    }else{
        echo "Valid email";
    }
}
?>
