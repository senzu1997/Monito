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
const categoryBtn = document.querySelector('#category');
const homeBtn = document.querySelector('#home');
const cardContainer = document.querySelector('#cardView');
const modalEl = document.querySelector('.modal-open');
const overlayEl = document.querySelector('.overlay');


let menuOpen = false;
let loginOpen = false;
let registerOpen = false;
let introOpen = false;
const stopVideo = function () {
    let iFrame = document.querySelector('iframe');
    let video = document.querySelector('video');

    if (iFrame) {
        let iFrameSrc = iFrame.src;
        iFrame.src = iFrame;
    } else {
        iFrame.src = "https://www.youtube.com/embed/MUdrGpYsUao"
    }

    if (iFrame) {
        video.pause();
    }
}
const resumeVideo = function () {
    let iFrame = document.querySelector('iframe');
    if (!iFrame) {
        iFrame.src = "https://youtu.be/MUdrGpYsUao"
    }
}

const modalClose = function () {
    modalEl.classList.add('hidden');
    overlayEl.classList.add('hidden');
    stopVideo();
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

introBtn.addEventListener('click', function () {
    modalEl.classList.toggle('hidden');
    overlayEl.classList.toggle('hidden');
    resumeVideo();
})
document.addEventListener('keydown', function (event) {
    if (event.key === "Escape" && !modalEl.classList.contains('hidden'))
        modalClose();
});
document.addEventListener('keydown', function () {
    modalClose();
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



