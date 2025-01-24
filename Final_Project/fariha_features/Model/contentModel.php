<?php
require_once 'db.php';

function getContentByType($type) {
    global $conn;
    $query = "SELECT content FROM nowshin_site_content WHERE type = '$type'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['content'];
    }
    return "Content not found.";
}
?>
