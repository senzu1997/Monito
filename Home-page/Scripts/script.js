const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector(".nav");
const loginForm = document.querySelector('#login-form');
const loginBtn = document.querySelector('.login');
const registerForm = document.querySelector('#register-form');
const registerBtn = document.querySelector('.registration');
const closeBtn = document.querySelector('.close');
const introBtn = document.querySelector('.view-intro');
const introForm = document.querySelector('.intro-video');
const closeIntro = document.querySelector('.close-intro');

let menuOpen = false;
let loginOpen = false;
let registerOpen = false;
let introOpen = false;

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

introBtn.addEventListener('click', () => {
    if (!introOpen) {
        introForm.classList.add('open');
        introOpen = true;
    } else {
        introForm.classList.remove('open')
        introOpen = false;
    }
})
closeIntro.addEventListener('click', () => {
    introForm.classList.remove('open');
    introOpen = false;
})
