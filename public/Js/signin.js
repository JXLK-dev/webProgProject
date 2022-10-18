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
    setTimeout(() => {
        window.location.href = "/register";
    }, 1000);
}

