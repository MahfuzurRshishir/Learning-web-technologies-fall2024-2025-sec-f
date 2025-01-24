document.getElementById('submitJobButton').addEventListener('click', function () {
   title = document.getElementById('title').value.trim();
    description = document.getElementById('description').value.trim();
    fileInput = document.getElementById('file');
    responseMessage = document.getElementById('responseMessage');
    let errors = [];

    if (title === "") errors.push("Job title is required.");
    if (description === "") errors.push("Job description is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = 'red';
        return;
    }

    formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);
    if (fileInput.files[0]) {
        formData.append('file', fileInput.files[0]);
    }

   xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/postJobController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            responseMessage.innerHTML = xhr.responseText;
            responseMessage.style.color = 'green';
        } else {
            responseMessage.innerHTML = "Failed to post job.";
            responseMessage.style.color = 'red';
        }
    };
    xhr.send(formData);
});
