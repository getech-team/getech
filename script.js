document.addEventListener('DOMContentLoaded', () => {
    // Animation d'apparition des modules au scroll
    const elementsToShow = document.querySelectorAll('.projet-module, .membre, .download-module');

    elementsToShow.forEach(el => {
        el.style.opacity = 0;
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
    });

    function revealOnScroll() {
        const windowHeight = window.innerHeight;
        elementsToShow.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) {
                el.style.opacity = 1;
                el.style.transform = 'translateY(0)';
            }
        });
    }

    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);

    // Bouton retour en haut
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        backToTopBtn.style.display = 'none'; // Masquer au départ

        window.addEventListener('scroll', () => {
            backToTopBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
