let maiLogoSpan = document.querySelectorAll('.MaiBoutique');
let intro = document.querySelector('.intro')


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
    })
});
