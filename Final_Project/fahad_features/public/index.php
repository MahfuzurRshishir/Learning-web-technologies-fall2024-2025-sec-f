<?php

// Load dependencies
require '../models/dbconnection.php';
require '../controllers/HomeController.php';
require '../controllers/SignInController.php';
require '../controllers/SignUpController.php';
require '../controllers/ForgotPasswordController.php';
require '../controllers/NotificationController.php';
require_once '../controllers/ReviewController.php';
require_once '../controllers/ContactController.php';
require_once '../controllers/FileController.php';

// Create and call the controller
$controller = new HomeController();
$controller = new SignInController($conn);
$controller = new SignUpController($conn);
$controller = new ForgotPasswordController($conn);
$controller = new NotificationController($conn);
$controller = new ReviewController($conn);
$controller = new ContactController($conn);
$controller = new FileController();



$response = $controller->handleRequest();
$controller->render();
$controller->handleRequest();
$message = $controller->handleRequest();
?>