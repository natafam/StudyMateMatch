const userIcon = document.querySelector('.logged-user-icon');
const userMenu = document.querySelector('.logged-user-menu');

userIcon.addEventListener('click', () => {
    userMenu.style.display = userMenu.style.display === 'none'? 'block' : 'none';
});

document.addEventListener('click', function(event) {
    if (!userIcon.contains(event.target) && !userMenu.contains(event.target)) {
        userMenu.style.display = 'none';
    }
});
