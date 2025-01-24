<?php
    require_once 'db.php';

    function publishCourse($title, $description, $start_date, $end_date, $publisher_id) {
        $conn = db();
        $sql = "INSERT INTO shish_courses (title, description, start_date, end_date, publisher_id) 
                VALUES ('$title', '$description', '$start_date', '$end_date', $publisher_id)";
        return mysqli_query($conn, $sql);
    }

    function getCoursesByPublisher($publisher_id) {
        $conn = db();
        $sql = "SELECT * FROM shish_courses WHERE publisher_id = $publisher_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function deleteCourse($course_id) {
        $conn = db();
        $sql = "DELETE FROM shish_courses WHERE id = $course_id";
        return mysqli_query($conn, $sql);
    }
    function getAppliedCoursesByUser($user_id) {
        $conn = db();
        $sql = "SELECT c.title, c.description, c.start_date, c.end_date, a.application_date 
                FROM shish_course_applications a
                JOIN shish_courses c ON a.course_id = c.id
                WHERE a.user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function getApplicantsByCourseId($course_id) {
        $conn = db(); 
        $sql = "SELECT u.fullname, u.email, a.application_date 
                FROM shish_course_applications a
                JOIN shish_users u ON a.user_id = u.id
                WHERE a.course_id = $course_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function getUpcomingCourses() {
        $conn = db(); 
        $sql = "SELECT * FROM shish_courses WHERE start_date > CURDATE() ORDER BY start_date ASC";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function applyForCourse($course_id, $user_id, $application_date) {
        $conn = db(); 
        $sql = "INSERT INTO shish_course_applications (course_id, user_id, application_date) 
                VALUES ($course_id, $user_id, '$application_date')";
        return mysqli_query($conn, $sql);
    }
    function hasAppliedCourse($course_id, $user_id) {
        $conn = db();
        $sql = "SELECT * FROM shish_course_applications WHERE course_id = $course_id AND user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result) > 0; 
    }
    
    
    

?>
