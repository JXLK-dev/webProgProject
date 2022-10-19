let intro = document.querySelector('.intro');
let signin = document.getElementById('signin');
let subtitle = document.getElementById('subtitle');
let register = document.getElementById('register');
let checkAccount = document.getElementById('checkAccount');
let button = document.getElementById('signin');
// let login = document.getElementById('login');
window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        setTimeout(() => {
            intro.style.right = '-50%';
            signin.style.opacity = '1';
            subtitle.style.opacity = '1';
            register.style.opacity = '1';
            checkAccount.style.opacity = '1';
        }, 0);
    })
});
button.onclick = function () {
    // body.style.background = 'black'
    intro.style.right = '0';
    signin.style.opacity = '0';
    subtitle.style.opacity = '0';
    register.style.opacity = '0';
    checkAccount.style.opacity = '0';
    setTimeout(() => {
        window.location.href = "/signin";
    }, 1100);
}

