const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector(".nav");
const loginForm = document.querySelector('#login-form');
const loginBtn = document.querySelector('.login');
const registerForm = document.querySelector('#register-form');
const registerBtn = document.querySelector('.registration');
const closeBtn = document.querySelector('.close');

let menuOpen = false;
let loginOpen = false;
let registerOpen = false;

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
        registerForm.classList.remove('open');
        loginOpen = true;
    } else {
        loginForm.classList.remove('open');
    }
})

registerBtn.addEventListener('click', () => {
    if (!registerOpen) {
        registerForm.classList.add('open');
        loginForm.classList.remove('open');
        registerOpen = true;
    } else {
        registerForm.classList.remove('open');
        registerOpen = false;
    }
})
closeBtn.addEventListener('click', () => {
    if (registerOpen) {
        registerForm.classList.remove('open');
    }
})

closeBtn.addEventListener('click', () => {
    if (loginOpen) {
        loginForm.classList.remove('open');
    }
})
