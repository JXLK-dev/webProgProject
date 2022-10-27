let maiLogoSpan = document.querySelectorAll('.MaiBoutique');
let intro = document.querySelector('.intro')
let visited = false;

// function getCookie(cookieName) {
//     let name = cookieName + "=";
//     let decodingCookie = decodeURIComponent(document.cookie);
//     let parts = decodingCookie.split(';');
//     for (let i = 0; i < parts.length; i++) {
//         let part = parts[i];
//         while (part.charAt(0) == ' ') {
//             part = part.substring(1);
//         }
//         if (part.indexOf(name) == 0) {
//             return part.substring(name.length, part.length);
//         }
//     }
//     return "";
// }

// function setCookie(cookieName, cookieValue, exmin) {
//     const date = new Date();
//     date.setTime(d.getTime() + (exmin * 60 * 1000));
//     let expires = "expires=" + d.toUTCString();
//     document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
// }



// if (getCookie("visited") == "") {
window.addEventListener('DOMContentLoaded', () => {
    if (document.cookie)
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
    // setCookie("visited", true, 1000000000);
// }

