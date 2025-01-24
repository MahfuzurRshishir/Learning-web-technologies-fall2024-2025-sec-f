document.getElementById('forgotPasswordButton').addEventListener('click', function () {
    const email = document.getElementById('email').value.trim();
    const responseMessage = document.getElementById('responseMessage');

    if (email === "" || !email.includes("@")) {
        responseMessage.innerHTML = "Valid email is required!";
        responseMessage.style.color = "red";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', ':127.0.0.1/htdocs/Merged_project/mahfuz_project_jobsite/Controller/forgotPasswordController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function () {
        try {
            window.alert("okkkk");

            const response = JSON.parse(xhr.responseText);

            if (xhr.status === 200 && response.status === "success") {
                responseMessage.innerHTML = response.message;
                responseMessage.style.color = "green";
                window.alert(response.message);
            } else {
                responseMessage.innerHTML = response.message || "An error occurred.";
                responseMessage.style.color = "red";
            }
        } catch (error) {
            responseMessage.innerHTML = "Invalid server response. Please try again."+error.message;
            responseMessage.style.color = "red";
            console.error("Error parsing JSON response:", error);
        }
    };

    xhr.onerror = function () {
        responseMessage.innerHTML = "Failed to send request. Check your connection.";
        responseMessage.style.color = "red";
    };

    const data = JSON.stringify({ email });
    xhr.send(data);
});