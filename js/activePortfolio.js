// activePortfolio.js
export function activePortfolio() {
    const linkPortfolio = document.querySelectorAll('.portfolio_item');
    
    linkPortfolio.forEach(l => {
        l.addEventListener('click', function() {
            linkPortfolio.forEach(item => item.classList.remove('active-portfolio'));
            this.classList.add('active-portfolio');
        });
    });
}
