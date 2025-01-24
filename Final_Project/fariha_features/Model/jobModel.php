<?php
    require_once 'db.php';

    function createJob($employeeId, $title, $description, $filePath) {
        global $conn;
        $query = "INSERT INTO nowshin_jobs (employee_id, title, description, file_path) VALUES ('$employeeId', '$title', '$description', '$filePath')";
        return mysqli_query($conn, $query);
    }

    function getJobsByEmployee($employeeId) {
        global $conn;
        $query = "SELECT * FROM nowshin_jobs WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $query);
        $jobs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
        return $jobs;
    }

    function getApplicationsByJob($jobId) {
        global $conn;
        $query = "SELECT applications.*, users.name AS applicant_name FROM nowshin_applications 
                JOIN nowshin_users ON applications.user_id = users.id 
                WHERE applications.job_id = '$jobId'";
        $result = mysqli_query($conn, $query);
        $applications = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $applications[] = $row;
        }
        return $applications;
    }

    function updateApplicationStatus($applicationId, $status) {
        global $conn;
        $query = "UPDATE nowshin_applications SET status = '$status' WHERE id = '$applicationId'";
        return mysqli_query($conn, $query);
    }
    function isJobOwnedByEmployee($employeeId, $jobId) {
        global $conn;
        $query = "SELECT id FROM nowshin_jobs WHERE id = '$jobId' AND employee_id = '$employeeId'";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result) > 0;
    }
    function getAllJobs() {
        global $conn;
        $query = "SELECT * FROM nowshin_jobs";
        $result = mysqli_query($conn, $query);
        $jobs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
        return $jobs;
    }
    function getJobById($jobId) {
        global $conn;
        $query = "SELECT * FROM nowshin_jobs WHERE id = '$jobId'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }
?>
