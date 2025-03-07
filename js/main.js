/* scroll sections for active links */ 
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.scrollY

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav_menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav_menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/* change background header */ 
function scrollHeader(){
    const header = document.getElementById('header')
    if(this.scrollY >= 200) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll' , scrollHeader)

/* show scroll top */ 
function scrollTop(){
    const scrollTop = document.getElementById('scroll-top')
    if(this.scrollY >= 560) scrollTop.classList.add('show-scroll'); else scrollTop.classList.remove('show-scroll')
}
window.addEventListener('scroll' , scrollTop)

/* mixit up filter */ 
var mixer = mixitup(".portfolio_container", {
    selectors: {
        target: '.portfolio_content'
    },
    animation: {
        duration: 400
    }
});

/* link to the active portfolio category */
const linkPortfolio = document.querySelectorAll('.portfolio_item')

function activePortfolio(){
    if(linkPortfolio){
        linkPortfolio.forEach(l=> l.classList.remove('active-portfolio'))
        this.classList.add('active-portfolio')
    }
}
linkPortfolio.forEach(l=> l.addEventListener('click', activePortfolio))

/* gsap animation */
gsap.from('.home_img', {opacity: 0, duration: 2, delay: .5, x: 60})

gsap.from('.home_data', {opacity: 0, duration: 2, delay: .8, y: 25})
gsap.from('.home_greeting, .home_name, .home_profession, .home_button', {opacity: 0, duration: 2, delay: 1, y: 25, ease:'expo.out', stagger: .2})

gsap.from('.nav_logo, .nav_toggle', {opacity:0, duration: 2, delay: 1.5, y: 25, ease:'expo.out', stagger: .2});
gsap.from('.nav_item', {opacity:0, duration: 2, delay: 1.8, y: 25, ease:'expo.out', stagger: .2});
gsap.from('.home_social-icon', {opacity: 0, duration: 2.5, delay: 2.3, y: 25, ease:'expo.out', stagger: .2})


gsap.registerPlugin(ScrollTrigger);

gsap.from('.fade-in', {
  opacity: 0,
  duration: 1.5,
  ease: 'power3.out',  // This adds smooth easing
  scrollTrigger: {
    trigger: '.fade-in',
    start: 'top 80%',
    end: 'bottom 20%',
    scrub: true,
    once: true,
  }
});