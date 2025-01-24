
function deleteJob(jobId) {
    if (confirm("Are you sure you want to delete this job?")) {
        fetch(`../Controller/deleteJobController.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ job_id: jobId }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert("Job deleted successfully!");
                    location.reload();
                } else {
                    alert("Error deleting job: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred. Please try again.");
            });
    }
}
