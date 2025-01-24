<?php
require_once 'models/UserModel.php';

class SignInController
{
    private $userModel;

    public function __construct($connection)
    {
        $this->userModel = new UserModel($connection);
    }

    public function handleRequest()
    {
        session_start();

        $errorMessage = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Fetch user by email
            $user = $this->userModel->getUserByEmail($email);

            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];

                    // Redirect to home page
                    header("Location: home.php?page=home");
                    exit();
                } else {
                    $errorMessage = "Invalid password!";
                }
            } else {
                $errorMessage = "User not found!";
            }
        }

        // Load the view with error message
        include 'views/signin.php';
    }
}
?>
