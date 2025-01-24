<?php
require_once '../Model/jobModel.php';

if (isset($_GET['job_id'])) {
    $jobId = $_GET['job_id'];
    $applications = getApplicationsByJob($jobId);

    echo json_encode($applications);
}
?>
