// scrollTop.js
export function scrollTop() {
    const scrollTopBtn = document.getElementById('scroll-top');
    if (window.scrollY >= 560) scrollTopBtn.classList.add('show-scroll');
    else scrollTopBtn.classList.remove('show-scroll');
}
window.addEventListener('scroll' , scrollTop)