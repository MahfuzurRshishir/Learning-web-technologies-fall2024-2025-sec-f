<?php
require_once __DIR__ . '/../models/ReviewModel.php';

class ReviewController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new ReviewModel($dbConnection);
    }

    public function handleRequest() {
        $response = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewType = $_POST['review_type'] ?? null;

            if ($reviewType === 'job') {
                $response = $this->submitJobReview();
            } elseif ($reviewType === 'website') {
                $response = $this->submitWebsiteReview();
            } elseif ($reviewType === 'profile') {
                $response = $this->submitProfileReview();
            }
        }
        return $response;
    }

    private function submitJobReview() {
        $title = htmlspecialchars(trim($_POST['job_title']));
        $rating = (int)$_POST['job_rating'];
        $review = htmlspecialchars(trim($_POST['job_review']));

        if ($this->isValidInput($title, $rating, $review)) {
            if ($this->model->saveReview('job', $title, $rating, $review)) {
                return ['success' => "Job Review Submitted Successfully!"];
            }
        }
        return ['error' => "Please fill in all fields and ensure the rating is between 1 and 5."];
    }

    private function submitWebsiteReview() {
        $rating = (int)$_POST['website_rating'];
        $review = htmlspecialchars(trim($_POST['website_review']));

        if ($this->isValidInput(null, $rating, $review)) {
            if ($this->model->saveReview('website', null, $rating, $review)) {
                return ['success' => "Website Review Submitted Successfully!"];
            }
        }
        return ['error' => "Please fill in all fields and ensure the rating is between 1 and 5."];
    }

    private function submitProfileReview() {
        $title = htmlspecialchars(trim($_POST['profile_name']));
        $rating = (int)$_POST['profile_rating'];
        $review = htmlspecialchars(trim($_POST['profile_review']));

        if ($this->isValidInput($title, $rating, $review)) {
            if ($this->model->saveReview('profile', $title, $rating, $review)) {
                return ['success' => "Profile Review Submitted Successfully!"];
            }
        }
        return ['error' => "Please fill in all fields and ensure the rating is between 1 and 5."];
    }

    private function isValidInput($title, $rating, $review) {
        return ($title === null || !empty($title)) && $rating >= 1 && $rating <= 5 && !empty($review);
    }
}
