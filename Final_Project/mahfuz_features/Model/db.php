<?php
function db() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'merged_db';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
