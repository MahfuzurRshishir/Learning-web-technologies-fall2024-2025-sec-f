document.addEventListener('DOMContentLoaded', function () {
   aboutContent = document.getElementById('aboutContent');

    xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/aboutUsController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            aboutContent.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
