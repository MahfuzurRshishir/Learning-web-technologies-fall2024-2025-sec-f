document.getElementById('loginButton').addEventListener('click', function () {
     username = document.getElementById('username').value.trim();
     password = document.getElementById('password').value.trim();
     responseMessage = document.getElementById('responseMessage');

    let errors = [];
    if (username === "") errors.push("Username is required.");
    if (password === "") errors.push("Password is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = "red";
        return;
    }

    xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/loginController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        const response = JSON.parse(xhr.responseText);
        if (response.status === "success") {
            window.location.href = response.redirect_url;
        } else {
            responseMessage.innerHTML = response.message;
            responseMessage.style.color = "red";
        }
    };

     data = JSON.stringify({ username, password });
    xhr.send(data);
});
