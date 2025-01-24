<?php
require_once 'models/UserModel.php';

class SignUpController
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = $_POST['role'];

            if (!$email) {
                $errorMessage = "Invalid email format!";
            } elseif ($this->userModel->isEmailExists($email)) {
                $errorMessage = "Email already exists! Please use a different email.";
            } else {
                if ($this->userModel->createUser($name, $email, $password, $role)) {
                    $successMessage = "Sign Up successful! <a href='signin.php'>Sign In</a>";
                } else {
                    $errorMessage = "An error occurred while creating your account.";
                }
            }
        }

        // Load the view
        include 'views/signup.view.php';
    }
}
?>
