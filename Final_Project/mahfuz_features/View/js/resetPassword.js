document.getElementById('resetPasswordButton').addEventListener('click', function () {
    const newPassword = document.getElementById('new_password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();
    const responseMessage = document.getElementById('responseMessage');

    let errors = [];
    if (newPassword === "") errors.push("New password is required.");
    if (confirmPassword === "") errors.push("Confirm password is required.");
    if (newPassword !== confirmPassword) errors.push("Passwords do not match.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = "red";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/resetPasswordController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
         response = JSON.parse(xhr.responseText);
        if (response.status === "success") {
            window.location.href = response.redirect_url;
        } else {
            responseMessage.innerHTML = response.message;
            responseMessage.style.color = "red";
        }
    };

    data = JSON.stringify({ new_password: newPassword, confirm_password: confirmPassword });
    xhr.send(data);
});
