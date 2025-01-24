<?php
    require_once 'db.php';

    function getAvailableJobs() {
        $conn = db();
        $sql = "SELECT * FROM shish_jobs";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function hasApplied($user_id, $job_id) {
        $conn = db();
        $sql = "SELECT * FROM shish_applications WHERE user_id = $user_id AND job_id = $job_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result) > 0;
    }
    function applyForJob($user_id, $job_id, $resume_path) {
        $conn = db();
        $resume_path = $resume_path ?? '';
        $resume_path_sql = mysqli_real_escape_string($conn, $resume_path);
        $sql = "INSERT INTO shish_applications (user_id, job_id, resume_path, application_date) 
                VALUES ($user_id, $job_id, '$resume_path_sql', NOW())";
        return mysqli_query($conn, $sql);
    }
    

    /*function applyForJob($user_id, $job_id, $resume_path) {
        $conn = db();
        $resume_path_sql = $resume_path ? "'$resume_path'" : "-";
        $sql = "INSERT INTO applications (user_id, job_id, resume_path, application_date) 
                VALUES ($user_id, $job_id, $resume_path_sql, NOW())";

        return mysqli_query($conn, $sql);
    } */   

    function getUserApplications($user_id) {
        $conn = db();
        $sql = "SELECT j.title, j.description, j.location, j.min_salary, j.max_salary, a.application_date
                FROM shish_applications a
                JOIN shish_jobs j ON a.job_id = j.id
                WHERE a.user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function getEmployerDetailsByJob($job_id) {
        $conn = db();
        $sql = "SELECT j.title AS job_title, u.id, u.email 
                FROM shish_jobs j 
                JOIN shish_users u ON j.employer_id = u.id 
                WHERE j.id = $job_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    function getJobsByEmployer($employer_id) {
        $conn = db();
        $sql = "SELECT * FROM shish_jobs WHERE employer_id = $employer_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function postJob($title, $description, $location, $min_salary, $max_salary, $employer_id) {
        $conn = db();
        $sql = "INSERT INTO shish_jobs (title, description, location, min_salary, max_salary, employer_id) 
                VALUES ('$title', '$description', '$location', $min_salary, $max_salary, $employer_id)";
        return mysqli_query($conn, $sql);
    }
    function getApplicationsByJobId($job_id){
        $conn = db();
        $sql = "SELECT 
                shish_users.fullname as name, 
                shish_users.email, 
                shish_applications.id,
                shish_applications.resume_path, 
                shish_applications.application_date
                FROM 
                shish_applications
                INNER JOIN 
                shish_users ON shish_applications.user_id = shish_users.id
                WHERE 
                shish_applications.job_id = '{$job_id}'";
                
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function getJobNameByJobID($job_id){
        $conn = db();
        $sql = "SELECT title FROM shish_jobs WHERE id = '$job_id'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            return $row['title']; 
        }
        return null; 
    }
    
?>
