document.addEventListener('DOMContentLoaded', function () {
    jobsTable = document.getElementById('jobsTable');

     xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/browseJobsController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            jobs = JSON.parse(xhr.responseText);
            if (jobs.length > 0) {
                let html = "<table><tr><th>Title</th><th>Description</th><th>Actions</th></tr>";
                jobs.forEach(job => {
                    html += `
                        <tr>
                            <td>${job.title}</td>
                            <td>${job.description}</td>
                            <td>
                                <button class="apply-btn" data-job-id="${job.id}">Apply</button>
                            </td>
                        </tr>
                    `;
                });
                html += "</table>";
                jobsTable.innerHTML = html;

                document.querySelectorAll('.apply-btn').forEach(function (button) {
                    button.addEventListener('click', function () {
                        jobId = this.getAttribute('data-job-id');
                        window.location.href = `apply_job.php?job_id=${jobId}`;
                    });
                });
            } else {
                jobsTable.innerHTML = "<p>No jobs available at the moment.</p>";
            }
        }
    };
    xhr.send();
});
