document.getElementById('signUpButton').addEventListener('click', function () {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const role = document.getElementById('role').value.trim();
    const responseMessage = document.getElementById('responseMessage');
    let errors = [];

    if (name === "") errors.push("Name is required.");
    if (email === "") errors.push("Email is required.");
    if (!email.includes("@") || !email.includes(".")) errors.push("Invalid email format.");
    if (password === "") errors.push("Password is required.");
    if (role === "") errors.push("Role selection is required.");

    if (errors.length > 0) {
        responseMessage.innerHTML = errors.join('<br>');
        responseMessage.style.color = 'red';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/signUpValidate.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            responseMessage.innerHTML = xhr.responseText;
            responseMessage.style.color = 'green';
        } else {
            responseMessage.innerHTML = "Sign-up failed.";
            responseMessage.style.color = 'red';
        }
    };

    const data = JSON.stringify({ name, email, password, role });
    xhr.send(data);
});
