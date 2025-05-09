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

// Défilement automatique du carrousel toutes les 10 secondes avec interaction utilisateur
document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const items = document.querySelectorAll('.carousel-item');
    let index = 0;
    let interval;

    function scrollCarousel() {
        index = (index + 1) % items.length;
        const itemWidth = items[0].offsetWidth;
        track.scrollTo({
            left: itemWidth * index,
            behavior: 'smooth'
        });
    }

    function startAutoScroll() {
        interval = setInterval(scrollCarousel, 10000); // toutes les 10 secondes
    }

    function stopAutoScroll() {
        clearInterval(interval);
    }

    // Redémarrer après une interaction utilisateur
    function resetAutoScroll() {
        stopAutoScroll();
        startAutoScroll();
    }

    // Pause lors du survol
    track.addEventListener('mouseenter', stopAutoScroll);
    track.addEventListener('mouseleave', startAutoScroll);

    // Navigation manuelle (si on ajoute des flèches plus tard)
    track.addEventListener('wheel', () => {
        resetAutoScroll();
    });

    // Lancer le défilement au chargement
    if (track && items.length > 0) {
        startAutoScroll();
    }
});
