const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector(".nav");
const loginForm = document.querySelector('#login-form');
const loginBtn = document.querySelector('.login');
const registerForm = document.querySelector('#register-form');
const registerBtn = document.querySelector('.registration');
const closeBtn = document.querySelector('.close');
const introButton = document.querySelectorAll('#introBtn');
const introForm = document.querySelector('.intro-video');
const closeIntro = document.querySelector('.close-intro');
const categoryBtn = document.querySelector('#category');
const homeBtn = document.querySelector('#home');
const cardContainer = document.querySelector('#cardView');
const modalEl = document.querySelector('.modal-open');
const overlayEl = document.querySelector('.overlay');
const videoUrl = "https://www.youtube.com/embed/MUdrGpYsUao";
const iFrame = document.getElementById('video');

let menuOpen = false;
let loginOpen = false;
let registerOpen = false;
let introOpen = false;

const modalClose = function () {
    modalEl.classList.add('hidden');
    overlayEl.classList.add('hidden');
}
const modalOpen = function () {
    modalEl.classList.remove('hidden');
    overlayEl.classList.remove('hidden');
    iFrame.src = videoUrl;
}
document.addEventListener('keydown', function () {
    modalClose();
    iFrame.src = " "
})

for (let i = 0; i < introButton.length; i++) {
    introButton[i].addEventListener('click', modalOpen)
}

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



$("a[href='#top']").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "smooth");
    return false;
});
function scrollCategory() {
    window.scrollTo(0, 700);
}
function scrollAbout() {
    window.scrollTo(0, 1300);
}
function scrollContact() {
    window.scrollTo(0, 2500);
}



