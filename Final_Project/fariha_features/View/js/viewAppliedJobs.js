document.addEventListener('DOMContentLoaded', function () {
    const appliedJobsTable = document.getElementById('appliedJobsTable');

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/viewAppliedJobsController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const jobs = JSON.parse(xhr.responseText);
            if (jobs.length > 0) {
                let html = "<table><tr><th>Job Title</th><th>Status</th><th>Actions</th></tr>";
                jobs.forEach(job => {
                    html += `
                        <tr>
                            <td>${job.title}</td>
                            <td>${job.status}</td>
                            <td><a href="../uploads/resumes/${job.resume_path}" target="_blank">View Resume</a></td>
                        </tr>
                    `;
                });
                html += "</table>";
                appliedJobsTable.innerHTML = html;
            } else {
                appliedJobsTable.innerHTML = "<p>You have not applied for any jobs yet.</p>";
            }
        }
    };
    xhr.send();
});
