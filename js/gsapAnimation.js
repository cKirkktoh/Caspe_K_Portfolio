// gsapAnimation.js
import gsap from 'gsap';

export function gsapAnimations() {
    gsap.from('.home_img', { opacity: 0, duration: 2, delay: .5, x: 60 });
    gsap.from('.home_data', { opacity: 0, duration: 2, delay: .8, y: 25 });
    gsap.from('.home_greeting, .home_name, .home_profession, .home_button', { opacity: 0, duration: 2, delay: 1, y: 25, ease: 'expo.out', stagger: .2 });
    gsap.from('.nav_logo, .nav_toggle', { opacity: 0, duration: 2, delay: 1.5, y: 25, ease: 'expo.out', stagger: .2 });
    gsap.from('.nav_item', { opacity: 0, duration: 2, delay: 1.8, y: 25, ease: 'expo.out', stagger: .2 });
    gsap.from('.home_social-icon', { opacity: 0, duration: 2.5, delay: 2.3, y: 25, ease: 'expo.out', stagger: .2 });
}