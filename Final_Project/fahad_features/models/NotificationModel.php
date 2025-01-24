<?php
require_once '/config/dbconnection.php';

class NotificationModel
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function createNotification($type, $title, $message, $recipientEmail = null)
    {
        $sql = "INSERT INTO notifications (type, title, message, recipient_email, created_at) 
                VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $type, $title, $message, $recipientEmail);
        $stmt->execute();

        $isCreated = $stmt->affected_rows > 0;
        $stmt->close();

        return $isCreated;
    }
}
?>
