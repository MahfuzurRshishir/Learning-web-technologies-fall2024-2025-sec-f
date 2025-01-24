document.addEventListener('DOMContentLoaded', function () {
    applicationsTable = document.getElementById('applicationsTable');

    xhr = new XMLHttpRequest();
    xhr.open('GET', `../Controller/manageApplicationsController.php?job_id=${jobId}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
             applications = JSON.parse(xhr.responseText);
            if (applications.length > 0) {
                let html = "<table><tr><th>Applicant Name</th><th>Resume</th><th>Status</th><th>Actions</th></tr>";
                applications.forEach(app => {
                    html += `
                        <tr>
                            <td>${app.applicant_name}</td>
                            <td><a href="${app.resume_path}" target="_blank">View Resume</a></td>
                            <td>${app.status}</td>
                            <td>
                                <select data-application-id="${app.id}" class="status-dropdown">
                                    <option value="pending" ${app.status === 'pending' ? 'selected' : ''}>Pending</option>
                                    <option value="approved" ${app.status === 'approved' ? 'selected' : ''}>Approved</option>
                                    <option value="rejected" ${app.status === 'rejected' ? 'selected' : ''}>Rejected</option>
                                </select>
                            </td>
                        </tr>
                    `;
                });
                html += "</table>";
                applicationsTable.innerHTML = html;

                document.querySelectorAll('.status-dropdown').forEach(function (dropdown) {
                    dropdown.addEventListener('change', function () {
                        applicationId = this.getAttribute('data-application-id');
                         newStatus = this.value;

                         updateXhr = new XMLHttpRequest();
                        updateXhr.open('POST', '../Controller/updateApplicationStatusController.php', true);
                        updateXhr.setRequestHeader('Content-Type', 'application/json');
                        updateXhr.onload = function () {
                            if (updateXhr.status === 200) {
                                alert(updateXhr.responseText);
                            }
                        };
                        updateXhr.send(JSON.stringify({ applicationId, newStatus }));
                    });
                });
            } else {
                applicationsTable.innerHTML = "<p>No applications found for this job.</p>";
            }
        }
    };
    xhr.send();
});
