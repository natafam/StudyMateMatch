const burgerMenu = document.querySelector('.burger-menu');
const showMenu = document.querySelector('.shown-menu');
const closeMenu = document.querySelector('.menu-close');
const navLinks = document.querySelectorAll('.navbar-container a img,.nav a,.nav span');

burgerMenu.addEventListener('click', () => {
    showMenu.style.display = showMenu.style.display === 'none'? 'block' : 'none';
});

closeMenu.addEventListener('click', () => {
    showMenu.style.display = 'none';
});

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        showMenu.style.display = 'none';
    });
});

document.addEventListener('click', function(event) {
    if (!burgerMenu.contains(event.target) && !showMenu.contains(event.target)) {
        showMenu.style.display = 'none';
    }
});
