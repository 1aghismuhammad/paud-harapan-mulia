const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    callback();
};

ready(() => {
    const menuButton = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const closeButton = document.querySelector('[data-mobile-menu-close]');
    const overlay = document.querySelector('[data-mobile-menu-overlay]');

    if (menuButton && mobileMenu) {
        const setMenu = (open) => {
            menuButton.setAttribute('aria-expanded', String(open));
            mobileMenu.hidden = !open;
            document.documentElement.classList.toggle('overflow-hidden', open);
            document.body.classList.toggle('overflow-hidden', open);
        };

        menuButton.addEventListener('click', () => setMenu(menuButton.getAttribute('aria-expanded') !== 'true'));
        closeButton?.addEventListener('click', () => setMenu(false));
        overlay?.addEventListener('click', () => setMenu(false));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') setMenu(false);
        });
    }

    document.querySelectorAll('[data-mobile-submenu-toggle]').forEach((button) => {
        const target = document.getElementById(button.getAttribute('aria-controls'));
        if (!target) return;

        button.addEventListener('click', () => {
            const open = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', String(!open));
            target.hidden = open;
            const symbol = button.querySelector('[data-submenu-symbol]');
            if (symbol) symbol.textContent = open ? '+' : '−';
        });
    });

    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const previous = document.querySelector('[data-carousel-prev]');
        const next = document.querySelector('[data-carousel-next]');
        let active = 0;
        let timer;

        if (slides.length < 2) return;

        const show = (index) => {
            active = (index + slides.length) % slides.length;
            slides.forEach((slide, i) => {
                slide.hidden = i !== active;
                slide.setAttribute('aria-hidden', String(i !== active));
            });
            dots.forEach((dot, i) => {
                dot.setAttribute('aria-current', i === active ? 'true' : 'false');
                dot.classList.toggle('bg-white', i === active);
                dot.classList.toggle('bg-white/35', i !== active);
            });
        };

        const restart = () => {
            clearInterval(timer);
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                timer = setInterval(() => show(active + 1), 6500);
            }
        };

        previous?.addEventListener('click', () => { show(active - 1); restart(); });
        next?.addEventListener('click', () => { show(active + 1); restart(); });
        dots.forEach((dot, i) => dot.addEventListener('click', () => { show(i); restart(); }));

        show(0);
        restart();
    });
});
