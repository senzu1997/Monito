const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector(".nav");
const loginForm = document.querySelector('#login-form')
const loginBtn = document.querySelector('.login')

let menuOpen = false;
let loginOpen = false

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
loginBtn.addEventListener('click', () => {
    if (!loginOpen) {
        loginForm.classList.add('open');
    } else {
        loginForm.classList.remove('open');
    }
})
