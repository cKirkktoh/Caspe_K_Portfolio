// mixitupFilter.js
import mixitup from 'mixitup';

export function initMixitup() {
    const mixer = mixitup(".portfolio_container", {
        selectors: {
            target: '.portfolio_content'
        },
        animation: {
            duration: 400
        }
    });
}
