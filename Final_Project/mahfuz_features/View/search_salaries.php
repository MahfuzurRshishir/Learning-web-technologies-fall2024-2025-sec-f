<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'User') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Salaries</title>
    <link rel="stylesheet" href="css/searchSalariesStyles.css">
</head>
<body>
    <div class="search-container">
        <h1>Search Salaries</h1>
        <form id="searchSalariesForm" method="POST">
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title"><br><br>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location"><br><br>
            <button type="button" id="searchButton">Search</button>
        </form>
        <p id="responseMessage"></p>
        <div id="resultsContainer"></div>
        <button onclick="window.location.href='user_homepage.php'">Back to Home</button>
    </div>
    <script src="js/searchSalaries.js"></script>
</body>
</html>
