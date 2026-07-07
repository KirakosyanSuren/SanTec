const burger = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');
const overlay = document.getElementById('overlay');
const closeMenu = document.getElementById('closeMenu');

function openMenu() {
    mobileMenu.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
}

burger.addEventListener('click', openMenu);
closeMenu.addEventListener('click', closeMobileMenu);
overlay.addEventListener('click', closeMobileMenu);
