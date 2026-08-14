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

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            mobileMenu.hidden = isOpen;
        });
    }

    document.querySelectorAll('[data-mobile-submenu-toggle]').forEach((button) => {
        const targetId = button.getAttribute('aria-controls');
        const target = targetId ? document.getElementById(targetId) : null;

        if (!target) return;

        button.addEventListener('click', () => {
            const isOpen = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', String(!isOpen));
            target.hidden = isOpen;
            button.querySelector('[data-chevron]')?.classList.toggle('rotate-180', !isOpen);
        });
    });

    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const previous = carousel.querySelector('[data-carousel-prev]');
        const next = carousel.querySelector('[data-carousel-next]');
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        let activeIndex = 0;
        let timer = null;

        if (slides.length < 2) return;

        const show = (index) => {
            activeIndex = (index + slides.length) % slides.length;

            slides.forEach((slide, slideIndex) => {
                const active = slideIndex === activeIndex;
                slide.hidden = !active;
                slide.setAttribute('aria-hidden', String(!active));
            });

            dots.forEach((dot, dotIndex) => {
                const active = dotIndex === activeIndex;
                dot.setAttribute('aria-current', active ? 'true' : 'false');
                dot.classList.toggle('bg-white', active);
                dot.classList.toggle('bg-white/40', !active);
            });
        };

        const stop = () => {
            if (timer) window.clearInterval(timer);
            timer = null;
        };

        const start = () => {
            if (reducedMotion) return;
            stop();
            timer = window.setInterval(() => show(activeIndex + 1), 6500);
        };

        previous?.addEventListener('click', () => {
            show(activeIndex - 1);
            start();
        });

        next?.addEventListener('click', () => {
            show(activeIndex + 1);
            start();
        });

        dots.forEach((dot, dotIndex) => {
            dot.addEventListener('click', () => {
                show(dotIndex);
                start();
            });
        });

        carousel.addEventListener('mouseenter', stop);
        carousel.addEventListener('mouseleave', start);
        carousel.addEventListener('focusin', stop);
        carousel.addEventListener('focusout', start);

        show(0);
        start();
    });
});
