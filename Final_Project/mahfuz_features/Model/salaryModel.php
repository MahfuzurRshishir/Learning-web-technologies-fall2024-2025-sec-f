<?php
    require_once 'db.php';

    function addSalary($job_title, $location, $min_salary, $max_salary, $employee_id) {
        $conn = db();
        $sql = "INSERT INTO shish_salaries (job_title, location, min_salary, max_salary, employee_id) 
                VALUES ('$job_title', '$location', '$min_salary', '$max_salary', '$employee_id')";
        return mysqli_query($conn, $sql);
    }

    function getSalariesByEmployee($employee_id) {
        $conn = db();
        $sql = "SELECT * FROM shish_salaries WHERE employee_id = $employee_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function deleteSalary($id) {
        $conn = db();
        $sql = "DELETE FROM shish_salaries WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
    function searchSalaries($job_title, $location) {
        $conn = db();
        $sql = "SELECT job_title, location, min_salary, max_salary 
                FROM shish_salaries 
                WHERE job_title LIKE '%$job_title%' AND location LIKE '%$location%'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function getSalaryById($id) {
        $conn = db();
        $sql = "SELECT * FROM shish_salaries WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    function updateSalary($id, $job_title, $location, $min_salary, $max_salary) {
        $conn = db();
        $sql = "UPDATE shish_salaries 
                SET job_title = '$job_title', location = '$location', 
                    min_salary = $min_salary, max_salary = $max_salary 
                WHERE id = $id";
        return mysqli_query($conn, $sql);
    }
    
?>
