document.getElementById('searchButton').addEventListener('click', function () {
    const jobTitle = document.getElementById('job_title').value.trim();
    const location = document.getElementById('location').value.trim();
    const responseMessage = document.getElementById('responseMessage');
    const resultsContainer = document.getElementById('resultsContainer');

    let errors = [];
    if (jobTitle === "") errors.push("Job title is required.");
    if (location === "") errors.push("Location is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = "red";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/searchSalariesController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        const response = JSON.parse(xhr.responseText);
        if (response.status === "success") {
            let resultsHtml = "<table><thead><tr><th>Job Title</th><th>Location</th><th>Salary Range (BDT)</th></tr></thead><tbody>";
            response.data.forEach(salary => {
                resultsHtml += `<tr>
                    <td>${salary.job_title}</td>
                    <td>${salary.location}</td>
                    <td>${salary.min_salary} - ${salary.max_salary}</td>
                </tr>`;
            });
            resultsHtml += "</tbody></table>";
            resultsContainer.innerHTML = resultsHtml;
            responseMessage.innerHTML = "";
        } else {
            responseMessage.innerHTML = response.message;
            responseMessage.style.color = "red";
            resultsContainer.innerHTML = "";
        }
    };

    const data = JSON.stringify({ job_title: jobTitle, location: location });
    xhr.send(data);
});
