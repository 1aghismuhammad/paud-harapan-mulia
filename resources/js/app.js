const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    callback();
};

const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
const prefersReducedMotion = () => reducedMotionQuery.matches;

document.documentElement.classList.add('motion-ready');

ready(() => {
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
            }, 300);
        };

        menuButton.addEventListener('click', () => {
            setMenu(menuButton.getAttribute('aria-expanded') !== 'true');
        });

        closeButton?.addEventListener('click', () => setMenu(false));
        overlay?.addEventListener('click', () => setMenu(false));

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => setMenu(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setMenu(false);
            }
        });
    }

    // ---------------------------------------------------------
    // Mobile submenu
    // ---------------------------------------------------------
    document.querySelectorAll('[data-mobile-submenu-toggle]').forEach((button) => {
        const target = document.getElementById(button.getAttribute('aria-controls'));
        const symbol = button.querySelector('[data-submenu-symbol]');

        if (!target) {
            return;
        }

        const setSubmenu = async (open) => {
            button.setAttribute('aria-expanded', String(open));

            if (symbol) {
                symbol.textContent = open ? '−' : '+';
            }

            if (prefersReducedMotion()) {
                target.hidden = !open;
                return;
            }

            if (open) {
                target.hidden = false;

                target.animate(
                    [
                        { opacity: 0, transform: 'translateY(-8px)' },
                        { opacity: 1, transform: 'translateY(0)' },
                    ],
                    {
                        duration: 200,
                        easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                    },
                );

                return;
            }

            const animation = target.animate(
                [
                    { opacity: 1, transform: 'translateY(0)' },
                    { opacity: 0, transform: 'translateY(-8px)' },
                ],
                {
                    duration: 180,
                    easing: 'ease',
                },
            );

            try {
                await animation.finished;
            } catch {
                // Fast repeated clicks may cancel a running Web Animation.
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
    // Hero carousel — 900ms crossfade + subtle 1.03 -> 1 zoom.
    // ---------------------------------------------------------
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const previous = carousel.closest('section')?.querySelector('[data-carousel-prev]');
        const next = carousel.closest('section')?.querySelector('[data-carousel-next]');
        let active = 0;
        let timer;

        if (slides.length === 0) {
            return;
        }

        const updateDots = () => {
            dots.forEach((dot, index) => {
                const selected = index === active;

                dot.setAttribute('aria-current', selected ? 'true' : 'false');
                dot.classList.toggle('bg-white', selected);
                dot.classList.toggle('bg-white/35', !selected);
            });
        };

        const show = (index) => {
            active = (index + slides.length) % slides.length;

            if (prefersReducedMotion()) {
                slides.forEach((slide, slideIndex) => {
                    const selected = slideIndex === active;

                    slide.hidden = !selected;
                    slide.setAttribute('aria-hidden', String(!selected));
                });

                updateDots();
                return;
            }

            carousel.classList.add('is-enhanced');

            slides.forEach((slide, slideIndex) => {
                const selected = slideIndex === active;

                slide.hidden = false;
                slide.classList.toggle('is-active', selected);
                slide.setAttribute('aria-hidden', String(!selected));
            });

            updateDots();
        };

        const stop = () => {
            clearInterval(timer);
        };

        const restart = () => {
            stop();

            if (!prefersReducedMotion() && slides.length > 1) {
                timer = window.setInterval(() => {
                    show(active + 1);
                }, 6500);
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

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                show(index);
                restart();
            });
        });

        carousel.addEventListener('pointerenter', stop);
        carousel.addEventListener('pointerleave', restart);
        carousel.addEventListener('focusin', stop);
        carousel.addEventListener('focusout', restart);

        show(0);
        restart();
    });

    // ---------------------------------------------------------
    // Testimonial — 550ms slide + 5500ms autoplay.
    // ---------------------------------------------------------
    document.querySelectorAll('[data-testimonial-slider]').forEach((slider) => {
        const track = slider.querySelector('[data-testimonial-track]');
        const dots = [...slider.querySelectorAll('[data-testimonial-dot]')];
        let currentIndex = 0;
        let startX = 0;
        let autoplayTimer;

        if (!track || dots.length === 0) {
            return;
        }

        const goToSlide = (index) => {
            currentIndex = (index + dots.length) % dots.length;
            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, dotIndex) => {
                const active = dotIndex === currentIndex;

                dot.classList.toggle('bg-brand-green-600', active);
                dot.classList.toggle('bg-[#edf0f3]', !active);
                dot.setAttribute('aria-pressed', active ? 'true' : 'false');
            });
        };

        const stopAutoplay = () => {
            clearInterval(autoplayTimer);
        };

        const startAutoplay = () => {
            stopAutoplay();

            if (!prefersReducedMotion() && dots.length > 1) {
                autoplayTimer = window.setInterval(() => {
                    goToSlide(currentIndex + 1);
                }, 5500);
            }
        };

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                startAutoplay();
            });
        });

        slider.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                goToSlide(currentIndex - 1);
                startAutoplay();
            }

            if (event.key === 'ArrowRight') {
                goToSlide(currentIndex + 1);
                startAutoplay();
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

                if (Math.abs(distance) < 50) {
                    return;
                }

                goToSlide(distance < 0 ? currentIndex + 1 : currentIndex - 1);
                startAutoplay();
            },
            { passive: true },
        );

        slider.addEventListener('pointerenter', stopAutoplay);
        slider.addEventListener('pointerleave', startAutoplay);
        slider.addEventListener('focusin', stopAutoplay);
        slider.addEventListener('focusout', startAutoplay);

        goToSlide(0);
        startAutoplay();
    });

    // ---------------------------------------------------------
    // Reusable scroll reveal — one IntersectionObserver.
    // ---------------------------------------------------------
    const revealElements = [];
    const revealGroups = [
        {
            elements: [...document.querySelectorAll('.home-feature-container > *')],
            stagger: 80,
        },
        {
            elements: [...document.querySelectorAll('.home-main-container > *')],
            stagger: 100,
        },
        {
            elements: [...document.querySelectorAll('[data-motion-unit-card]')],
            stagger: 80,
        },
        {
            elements: [...document.querySelectorAll('.home-news-container > .text-center, .home-news-container .news-reference-card')],
            stagger: 80,
        },
        {
            elements: [...document.querySelectorAll('.inner-page-hero-inner > *')],
            stagger: 80,
        },
        {
            elements: [...document.querySelectorAll('.reference-media-card')],
            stagger: 80,
        },
        {
            elements: [...document.querySelectorAll('.unit-showcase-row')],
            stagger: 80,
        },
    ];

    revealGroups.forEach(({ elements, stagger }) => {
        elements.forEach((element, index) => {
            element.style.setProperty('--reveal-delay', `${index * stagger}ms`);
            revealElements.push(element);
        });
    });

    document.querySelectorAll('[data-testimonial-slider], .page-section-space > *').forEach((element) => {
        revealElements.push(element);
    });

    const uniqueRevealElements = [...new Set(revealElements)];

    if (prefersReducedMotion() || !('IntersectionObserver' in window)) {
        uniqueRevealElements.forEach((element) => {
            element.classList.add('motion-visible');
        });

        return;
    }

    const observer = new IntersectionObserver(
        (entries, currentObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('motion-visible');
                currentObserver.unobserve(entry.target);
            });
        },
        {
            threshold: 0.14,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    uniqueRevealElements.forEach((element) => {
        observer.observe(element);
    });
});
