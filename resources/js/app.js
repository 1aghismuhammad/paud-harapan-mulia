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
    const menuCloseButton = document.querySelector('[data-mobile-menu-close]');
    const menuOverlay = document.querySelector('[data-mobile-menu-overlay]');

    if (menuButton && mobileMenu) {
        const setMenuState = (isOpen) => {
            menuButton.setAttribute('aria-expanded', String(isOpen));
            mobileMenu.hidden = !isOpen;
            document.documentElement.classList.toggle('overflow-hidden', isOpen);
            document.body.classList.toggle('overflow-hidden', isOpen);

            if (isOpen) {
                window.requestAnimationFrame(() => menuCloseButton?.focus());
            } else {
                menuButton.focus();
            }
        };

        menuButton.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            setMenuState(!isOpen);
        });

        menuCloseButton?.addEventListener('click', () => setMenuState(false));
        menuOverlay?.addEventListener('click', () => setMenuState(false));

        mobileMenu.querySelectorAll('a[href]').forEach((link) => {
            link.addEventListener('click', () => setMenuState(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') {
                setMenuState(false);
            }
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
            button.querySelector('[data-submenu-vertical]')?.classList.toggle('hidden', !isOpen);
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
