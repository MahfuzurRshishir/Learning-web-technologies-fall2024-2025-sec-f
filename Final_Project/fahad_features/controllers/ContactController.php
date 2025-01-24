<?php
require_once __DIR__ . '/../models/ContactModel.php';

class ContactController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new ContactModel($dbConnection);
    }

    public function handleRequest() {
        $response = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $message = htmlspecialchars(trim($_POST['message']));

            if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($this->model->saveContactMessage($name, $email, $message)) {
                    $response['success'] = "Thank you for contacting us! Your message has been sent.";
                } else {
                    $response['error'] = "Error: Could not send your message. Please try again.";
                }
            } else {
                $response['error'] = "Please fill in all fields with valid information.";
            }
        }

        return $response;
    }
}
