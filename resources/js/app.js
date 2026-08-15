const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    callback();
};

const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
const prefersReducedMotion = () => reducedMotionQuery.matches;

ready(() => {
    if (!prefersReducedMotion()) {
        document.documentElement.classList.add('motion-enabled');
    }

    // ---------------------------------------------------------
    // Mobile navigation
    // ---------------------------------------------------------
    const menuButton = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const closeButton = document.querySelector('[data-mobile-menu-close]');
    const overlay = document.querySelector('[data-mobile-menu-overlay]');
    let menuCloseTimer;

    if (menuButton && mobileMenu) {
        const setMenu = (open) => {
            clearTimeout(menuCloseTimer);

            menuButton.setAttribute('aria-expanded', String(open));
            document.documentElement.classList.toggle('overflow-hidden', open);
            document.body.classList.toggle('overflow-hidden', open);

            if (open) {
                mobileMenu.hidden = false;

                if (prefersReducedMotion()) {
                    mobileMenu.dataset.open = 'true';
                    return;
                }

                requestAnimationFrame(() => {
                    mobileMenu.dataset.open = 'true';
                });

                return;
            }

            mobileMenu.dataset.open = 'false';

            if (prefersReducedMotion()) {
                mobileMenu.hidden = true;
                return;
            }

            menuCloseTimer = window.setTimeout(() => {
                mobileMenu.hidden = true;
            }, 320);
        };

        menuButton.addEventListener('click', () => {
            setMenu(menuButton.getAttribute('aria-expanded') !== 'true');
        });

        closeButton?.addEventListener('click', () => setMenu(false));
        overlay?.addEventListener('click', () => setMenu(false));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') setMenu(false);
        });
    }

    // ---------------------------------------------------------
    // Mobile submenus
    // ---------------------------------------------------------
    document.querySelectorAll('[data-mobile-submenu-toggle]').forEach((button) => {
        const target = document.getElementById(button.getAttribute('aria-controls'));
        const verticalLine = button.querySelector('[data-submenu-vertical]');

        if (!target) return;

        const setSubmenu = async (open) => {
            button.setAttribute('aria-expanded', String(open));
            verticalLine?.classList.toggle('hidden', open);

            if (prefersReducedMotion()) {
                target.hidden = !open;
                return;
            }

            if (open) {
                target.hidden = false;
                target.animate(
                    [
                        { opacity: 0, transform: 'translateY(-6px)' },
                        { opacity: 1, transform: 'translateY(0)' },
                    ],
                    {
                        duration: 200,
                        easing: 'ease-out',
                    },
                );

                return;
            }

            const animation = target.animate(
                [
                    { opacity: 1, transform: 'translateY(0)' },
                    { opacity: 0, transform: 'translateY(-6px)' },
                ],
                {
                    duration: 160,
                    easing: 'ease-in',
                },
            );

            try {
                await animation.finished;
            } catch {
                // Animation may be cancelled by a fast repeated click.
            }

            if (button.getAttribute('aria-expanded') === 'false') {
                target.hidden = true;
            }
        };

        button.addEventListener('click', () => {
            setSubmenu(button.getAttribute('aria-expanded') !== 'true');
        });
    });

    // ---------------------------------------------------------
    // Hero carousel
    // ---------------------------------------------------------
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const previous = carousel.querySelector('[data-carousel-prev]');
        const next = carousel.querySelector('[data-carousel-next]');
        let active = 0;
        let timer;

        if (slides.length < 2) return;

        const show = (index, animate = true) => {
            const nextIndex = (index + slides.length) % slides.length;
            const previousIndex = active;

            active = nextIndex;

            slides.forEach((slide, i) => {
                const selected = i === active;
                slide.hidden = !selected;
                slide.setAttribute('aria-hidden', String(!selected));
            });

            if (
                animate
                && previousIndex !== active
                && !prefersReducedMotion()
            ) {
                slides[active].animate(
                    [
                        { opacity: 0.22 },
                        { opacity: 1 },
                    ],
                    {
                        duration: 460,
                        easing: 'ease-out',
                    },
                );
            }

            dots.forEach((dot, i) => {
                const selected = i === active;
                dot.setAttribute('aria-current', selected ? 'true' : 'false');
                dot.classList.toggle('bg-white', selected);
                dot.classList.toggle('bg-white/35', !selected);
            });
        };

        const stop = () => {
            clearInterval(timer);
        };

        const restart = () => {
            stop();

            if (!prefersReducedMotion()) {
                timer = window.setInterval(() => show(active + 1), 6500);
            }
        };

        previous?.addEventListener('click', () => {
            show(active - 1);
            restart();
        });

        next?.addEventListener('click', () => {
            show(active + 1);
            restart();
        });

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                show(i);
                restart();
            });
        });

        carousel.addEventListener('pointerenter', stop);
        carousel.addEventListener('pointerleave', restart);
        carousel.addEventListener('focusin', stop);
        carousel.addEventListener('focusout', restart);

        show(0, false);
        restart();
    });

    // ---------------------------------------------------------
    // Testimonial slider
    // ---------------------------------------------------------
    document.querySelectorAll('[data-testimonial-slider]').forEach((slider) => {
        const track = slider.querySelector('[data-testimonial-track]');
        const dots = [...slider.querySelectorAll('[data-testimonial-dot]')];
        let currentIndex = 0;
        let startX = 0;

        if (!track || dots.length === 0) return;

        const goToSlide = (index) => {
            const maxIndex = dots.length - 1;
            currentIndex = Math.max(0, Math.min(index, maxIndex));

            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, dotIndex) => {
                const active = dotIndex === currentIndex;

                dot.classList.toggle('bg-brand-green-600', active);
                dot.classList.toggle('bg-[#edf0f3]', !active);
                dot.setAttribute('aria-pressed', active ? 'true' : 'false');
            });
        };

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => goToSlide(index));
        });

        slider.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                goToSlide(currentIndex - 1);
            }

            if (event.key === 'ArrowRight') {
                goToSlide(currentIndex + 1);
            }
        });

        track.addEventListener(
            'touchstart',
            (event) => {
                startX = event.changedTouches[0].clientX;
            },
            { passive: true },
        );

        track.addEventListener(
            'touchend',
            (event) => {
                const distance = event.changedTouches[0].clientX - startX;

                if (Math.abs(distance) < 50) return;

                if (distance < 0) {
                    goToSlide(currentIndex + 1);
                } else {
                    goToSlide(currentIndex - 1);
                }
            },
            { passive: true },
        );

        goToSlide(0);
    });

    // ---------------------------------------------------------
    // Lightweight scroll reveal
    // ---------------------------------------------------------
    const revealElements = [];
    const mainSections = [...document.querySelectorAll('#main-content > section')];

    mainSections.forEach((section, index) => {
        // Hero gets its own initial-load animation.
        if (index === 0 && section.querySelector('[data-carousel]')) return;

        // Feature-card area is revealed as a staggered group instead.
        const featureCards = section.querySelectorAll('.home-feature-container > *');

        if (featureCards.length > 0) {
            featureCards.forEach((card, cardIndex) => {
                card.classList.add('motion-reveal', 'motion-reveal-small');
                card.style.setProperty('--motion-delay', `${cardIndex * 70}ms`);
                revealElements.push(card);
            });

            return;
        }

        section.classList.add('motion-reveal');
        revealElements.push(section);
    });

    if (prefersReducedMotion() || !('IntersectionObserver' in window)) {
        revealElements.forEach((element) => {
            element.classList.add('motion-visible');
        });

        return;
    }

    const observer = new IntersectionObserver(
        (entries, currentObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add('motion-visible');
                currentObserver.unobserve(entry.target);
            });
        },
        {
            threshold: 0.12,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    revealElements.forEach((element) => observer.observe(element));
});
