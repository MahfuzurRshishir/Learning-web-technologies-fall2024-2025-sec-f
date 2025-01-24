document.getElementById('signupButton').addEventListener('click', function () {
    const username = document.getElementById('username').value.trim();
    const fullname = document.getElementById('fullname').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const usertype = document.getElementById('usertype').value.trim();
    const responseMessage = document.getElementById('responseMessage');

    let errors = [];
    if (username === "") errors.push("Username is required.");
    if (fullname === "") errors.push("Full name is required.");
    if (email === "" || !email.includes("@")) errors.push("Valid email is required.");
    if (password === "") errors.push("Password is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = "red";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/signupController.php', true);
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

    const data = JSON.stringify({ username, fullname, email, password, usertype });
    xhr.send(data);
});
