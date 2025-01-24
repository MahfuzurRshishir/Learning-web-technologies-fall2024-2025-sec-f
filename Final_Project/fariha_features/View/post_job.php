<!DOCTYPE html>
<html>
<head>
    <title>Post a Job</title>
    <link rel="stylesheet" href="css/postJobStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Post a Job</h2>
        <form id="postJobForm" enctype="multipart/form-data">
            <label>Job Title:</label><br>
            <input type="text" id="title" name="title"><br><br>

            <label>Job Description:</label><br>
            <textarea id="description" name="description"></textarea><br><br>

            <label>Attach a File (optional):</label><br>
            <input type="file" id="file" name="file"><br><br>

            <button type="button" id="submitJobButton">Post Job</button>
        </form>
        <div id="responseMessage"></div><br>
        <button id="submitJobButton" onclick="window.history.back()">Back</button>
    </div>
    <script src="js/postJob.js"></script>
</body>
</html>
<?php
include('../View/about_us.php');
?>
