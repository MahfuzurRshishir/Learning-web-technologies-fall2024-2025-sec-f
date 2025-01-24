document.addEventListener('DOMContentLoaded', function () {
     resourcesContent = document.getElementById('resourcesContent');

     xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/careerResourcesController.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            resourcesContent.innerHTML = xhr.responseText;
        } else {
            resourcesContent.innerHTML = "<p>Failed to load content.</p>";
        }
    };
    xhr.send();
});
