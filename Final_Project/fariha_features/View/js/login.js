document.getElementById('loginButton').addEventListener('click', function () {
     email = document.getElementById('email').value.trim();
    password = document.getElementById('password').value.trim();
    responseMessage = document.getElementById('responseMessage');
     let errors = [];

    if (email === "") errors.push("Email is required.");
    if (!email.includes("@") || !email.includes(".")) errors.push("Invalid email format.");
    if (password === "") errors.push("Password is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = 'red';
        return;
    }

    xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/loginValidate.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
             response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
                responseMessage.innerHTML = response.message;
                responseMessage.style.color = 'green';

                setTimeout(() => {
                    window.location.href = response.redirect_url;
                }, 2000);
            } else {
                responseMessage.innerHTML = response.message;
                responseMessage.style.color = 'red';
            }
        } else {
            responseMessage.innerHTML = "An error occurred. Please try again.";
            responseMessage.style.color = 'red';
        }
    };

    data = JSON.stringify({ email, password });
    xhr.send(data);
});
