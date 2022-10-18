let intro = document.querySelector('.intro')
let transitionPage = document.querySelector('.transitionPage');
let maiLogo = document.querySelector('.MaiBoutique-header');
let maiLogoSpan = document.querySelectorAll('.MaiBoutique');
let welcomelogo = document.getElementById('logo_on_banner');
let sub = document.getElementById('subtitle_welcome');
let buttonReveal = document.getElementById('sign-in-sign-out');
let regisButton = document.getElementById('register');
let signButton = document.getElementById('signIn');
window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        maiLogoSpan.forEach((span, idx) => {
            setTimeout(() => {
                span.classList.add('active');
            }, (idx + 1) * 400)
        });
        setTimeout(() => {
            maiLogoSpan.forEach((span, idx) => {
                setTimeout(() => {
                    span.classList.remove('active');
                    span.classList.add('fade');
                }, (idx + 1) * 50)
            });
        }, 2000);
        setTimeout(() => {
            maiLogoSpan.forEach((span, idx) => {
                setTimeout(() => {
                    span.classList.remove('active');
                    span.classList.add('fade');
                }, (idx + 1) * 50)
            });
        }, 2000);
        setTimeout(() => {
            intro.style.left = '-100%';
        }, 2300);
        setTimeout(() => {
            welcomelogo.style.right = '0px';
        }, 3500);
        setTimeout(() => {
            sub.style.top = '0';
            sub.style.opacity = '1';
        }, 4000);
        setTimeout(() => {
            buttonReveal.style.right = '0px';
            buttonReveal.style.opacity = '1';
        }, 4500);

    })
});
regisButton.onclick = function () {
    transitionPage.style.left = '0px';
    callPage(0);
}
signButton.onclick = function () {
    transitionPage.style.left = '0px';
    callPage(1);
}
function callPage(num) {
    setTimeout(() => {
        window.location.href = num == 1 ? "/signin" : "/register";
    }, 1000);
}
