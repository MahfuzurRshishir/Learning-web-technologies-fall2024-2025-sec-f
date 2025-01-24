document.addEventListener('DOMContentLoaded', function () {
    const jobsTable = document.getElementById('jobsTable');

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/viewJobsController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const jobs = JSON.parse(xhr.responseText);
            if (jobs.length > 0) {
                let html = "<table><tr><th>Title</th><th>Description</th><th>Actions</th></tr>";
                jobs.forEach(job => {
                    html += `
                        <tr>
                            <td>${job.title}</td>
                            <td>${job.description}</td>
                            <td>
                                <button class="view-applications" data-job-id="${job.id}">View Applications</button>
                            </td>
                        </tr>
                    `;
                });
                html += "</table>";
                jobsTable.innerHTML = html;

                document.querySelectorAll('.view-applications').forEach(function (button) {
                    button.addEventListener('click', function () {
                        const jobId = this.getAttribute('data-job-id');
                        window.location.href = `manage_applications.php?job_id=${jobId}`;
                    });
                });
            } else {
                jobsTable.innerHTML = "<p>No jobs posted yet.</p>";
            }
        }
    };
    xhr.send();
});
