<?php
require_once '../Model/jobModel.php';
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['applicationId'], $data['newStatus'])) {
    $applicationId = $data['applicationId'];
    $newStatus = $data['newStatus'];

    if (updateApplicationStatus($applicationId, $newStatus)) {
        echo "Application status updated successfully!";
    } else {
        echo "Error updating application status.";
    }
}
?>
