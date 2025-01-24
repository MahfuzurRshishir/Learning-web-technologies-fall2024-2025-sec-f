<?php
class ReviewModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function saveReview($type, $title = null, $rating, $review) {
        $stmt = $this->conn->prepare("INSERT INTO reviews (review_type, title, rating, review) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $type, $title, $rating, $review);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
