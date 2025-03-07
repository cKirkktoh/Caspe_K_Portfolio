// scrollHeader.js
export function scrollHeader() {
    const header = document.getElementById('header');
    if (window.scrollY >= 200) header.classList.add('scroll-header');
    else header.classList.remove('scroll-header');
}
window.addEventListener('scroll' , scrollHeader)