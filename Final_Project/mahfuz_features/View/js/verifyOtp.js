document.getElementById('verifyOtpButton').addEventListener('click', function () {
    const otp = document.getElementById('otp').value.trim();
    const responseMessage = document.getElementById('responseMessage');

    if (otp === "" || otp.length !== 6) {
        responseMessage.innerHTML = "Valid 6-digit OTP is required.";
        responseMessage.style.color = "red";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/verifyOtpController.php', true);
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

    const data = JSON.stringify({ otp });
    xhr.send(data);
});
