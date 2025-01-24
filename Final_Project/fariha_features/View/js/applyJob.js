document.getElementById('applyButton').addEventListener('click', function () {
     resumeInput = document.getElementById('resume');
    responseMessage = document.getElementById('responseMessage');
     jobId = document.querySelector('[name="job_id"]').value;
    let errors = [];

    if (resumeInput.files.length === 0) {
        errors.push("Resume file is required.");
    }

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = 'red';
        return;
    }

     formData = new FormData();
    formData.append('job_id', jobId);
    formData.append('resume', resumeInput.files[0]);

    xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/applyJobController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            responseMessage.innerHTML = xhr.responseText;
            responseMessage.style.color = 'green';
        } else {
            responseMessage.innerHTML = "Failed to apply for the job.";
            responseMessage.style.color = 'red';
        }
    };
    xhr.send(formData);
});
