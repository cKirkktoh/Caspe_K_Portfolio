/* show hamburger menu*/ 
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId)

    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            nav.classList.toggle('show-menu')
        })
    }
}

showMenu('nav-toggle','nav-menu')

/* remove hamburger menu*/ 
const navLink = document.querySelectorAll('.nav_link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

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

(() => {
    const form = document.querySelector("#contactForm");
    const feedBack = document.querySelector("#responseMessage");

    function handleForm(event) {
        event.preventDefault(); // Prevent form from submitting normally

        const thisForm = event.currentTarget;
        const formData = new URLSearchParams();
        
        // Collect the form data
        formData.append('fname', thisForm.elements.fname.value);
        formData.append('lname', thisForm.elements.lname.value);
        formData.append('email', thisForm.elements.email.value);
        formData.append('number', thisForm.elements.number.value);
        formData.append('message', thisForm.elements.message.value);

        // Basic Validation: Check if fields are empty
        if (!thisForm.elements.fname.value || 
            !thisForm.elements.lname.value || 
            !thisForm.elements.email.value || 
            !thisForm.elements.number.value || 
            !thisForm.elements.message.value) {
            feedBack.innerHTML = '<p>All fields are required!</p>';
            return;
        }

        // Email format validation
        if (!/\S+@\S+\.\S+/.test(thisForm.elements.email.value)) {
            feedBack.innerHTML = '<p>Please enter a valid email address.</p>';
            return;
        }

        // URL for PHP file to handle form submission
        const url = "http://localhost/Caspe_K_Portfolio/adduser.php"; 

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formData.toString()
        })
        .then(response => response.json())
        .then(responseText => {
            feedBack.innerHTML = ""; // Clear previous feedback

            if (responseText.errors) {
                // Display errors if any
                responseText.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedBack.appendChild(errorElement);
                });
            } else {

                form.reset();
                const successElement = document.createElement("p");
                successElement.textContent = responseText.message;
                feedBack.appendChild(successElement);
            }
        })
        .catch(error => {
            console.log(error);
            feedBack.innerHTML = "";
            const errorMessage = document.createElement("p");
            errorMessage.textContent = "Oops, something went wrong. Please try again later.";
            feedBack.appendChild(errorMessage);
        });
    }

    form.addEventListener("submit", handleForm);
})();
