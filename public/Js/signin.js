let intro = document.querySelector('.intro');
let signin = document.getElementById('signin');
let subtitle = document.getElementById('subtitle');
let register = document.getElementById('register');
let registerAccount = document.getElementById('registerAccount');
let button = document.getElementById('register');
// let login = document.getElementById('login');
window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        setTimeout(() => {
            intro.style.left = '-50%';
            signin.style.opacity = '1';
            subtitle.style.opacity = '1';
            register.style.opacity = '1';
            registerAccount.style.opacity = '1';
        }, 0);
    })
});
button.onclick = function () {
    // body.style.background = 'black'
    intro.style.left = '0';
    signin.style.opacity = '0';
    subtitle.style.opacity = '0';
    register.style.opacity = '0';
    registerAccount.style.opacity = '0';
    setTimeout(() => {
        window.location.href = "/register";
    }, 1000);
}

function onSubmission() {
    // body.style.background = 'black'
    intro.style.left = '0';
    signin.style.opacity = '0';
    subtitle.style.opacity = '0';
    register.style.opacity = '0';
    registerAccount.style.opacity = '0';

}

