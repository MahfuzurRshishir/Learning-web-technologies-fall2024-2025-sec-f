<?php
    require_once '../Model/jobModel.php';

    $jobs = getAllJobs();

    echo json_encode($jobs);
?>
