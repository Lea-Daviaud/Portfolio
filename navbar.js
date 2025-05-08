document.addEventListener("DOMContentLoaded", function () {
    fetch('navbar.html')
        .then(response => response.text())
        .then(data => {
            document.body.insertAdjacentHTML('afterbegin', data);
            const toggleBtn = document.querySelector('.navbar-toggle');
            const links = document.querySelector('.navbar-links');
            toggleBtn.addEventListener('click', () => {
                links.classList.toggle('show');
            });
        });
});
