<?php
class ContactModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function saveContactMessage($name, $email, $message) {
        $stmt = $this->conn->prepare("INSERT INTO contactsupport (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
