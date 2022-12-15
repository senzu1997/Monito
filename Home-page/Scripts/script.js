const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector(".nav");

let menuOpen = false;

menuBtn.addEventListener('click', () => {
    if (!menuOpen) {
        menuBtn.classList.add('open');
        navMenu.classList.toggle("active");
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        menuOpen = false;
        navMenu.classList.toggle("active");

    }
})