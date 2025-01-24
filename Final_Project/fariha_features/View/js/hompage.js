document.addEventListener('DOMContentLoaded', function () {
     xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/getNotifications.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            notifications = JSON.parse(xhr.responseText);
            notificationContainer = document.createElement('div');
            notificationContainer.className = 'notifications';
            notifications.forEach(notification => {
                 p = document.createElement('p');
                p.textContent = notification.message;
                notificationContainer.appendChild(p);
            });
            document.querySelector('.homepage-container').appendChild(notificationContainer);
        }
    };
    xhr.send();
});
