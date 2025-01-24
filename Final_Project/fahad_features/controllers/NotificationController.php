<?php
require_once 'models/NotificationModel.php';

class NotificationController
{
    private $notificationModel;

    public function __construct($connection)
    {
        $this->notificationModel = new NotificationModel($connection);
    }

    public function handleRequest()
    {
        $statusMessage = null;
        $statusColor = "red";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = '';
            $title = '';
            $message = '';
            $recipientEmail = null;

            if (isset($_POST['submit_general'])) {
                $type = 'general';
                $title = filter_input(INPUT_POST, 'general_title', FILTER_SANITIZE_STRING);
                $message = filter_input(INPUT_POST, 'general_message', FILTER_SANITIZE_STRING);
            } elseif (isset($_POST['submit_individual'])) {
                $type = 'individual';
                $title = filter_input(INPUT_POST, 'individual_title', FILTER_SANITIZE_STRING);
                $message = filter_input(INPUT_POST, 'individual_message', FILTER_SANITIZE_STRING);
                $recipientEmail = filter_input(INPUT_POST, 'recipient_email', FILTER_VALIDATE_EMAIL);
            } elseif (isset($_POST['submit_profile'])) {
                $type = 'profile';
                $title = filter_input(INPUT_POST, 'profile_title', FILTER_SANITIZE_STRING);
                $message = filter_input(INPUT_POST, 'profile_message', FILTER_SANITIZE_STRING);
            }

            if (empty($title) || empty($message) || ($type === 'individual' && empty($recipientEmail))) {
                $statusMessage = "Error: Please fill in all required fields.";
            } else {
                if ($this->notificationModel->createNotification($type, $title, $message, $recipientEmail)) {
                    $statusMessage = "Notification sent successfully!";
                    $statusColor = "green";
                } else {
                    $statusMessage = "Error: Failed to send notification.";
                }
            }
        }

        // Load the view
        include 'views/notifications.view.php';
    }
}
?>
