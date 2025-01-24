<?php
require_once 'models/UserModel.php';

class ForgotPasswordController
{
    private $userModel;

    public function __construct($connection)
    {
        $this->userModel = new UserModel($connection);
    }

    public function handleRequest()
    {
        $errorMessage = null;
        $successMessage = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
            $email = trim($_POST['email']);
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                if ($this->userModel->updatePassword($email, $hashedPassword)) {
                    $successMessage = "Password reset successful!";
                } else {
                    $errorMessage = "Error: Email not found or update failed!";
                }
            } else {
                $errorMessage = "Passwords do not match. Please try again.";
            }
        }

        // Load the view
        include 'views/forgotpassword.view.php';
    }
}
?>
