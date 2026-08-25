const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    callback();
};

const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
const prefersReducedMotion = () => reducedMotionQuery.matches;

document.documentElement.classList.add('js', 'motion-ready');

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
            const wasOpen = menuButton.getAttribute('aria-expanded') === 'true';

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

            if (wasOpen) {
                menuButton.focus();
            }

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
    // Hero carousel V5 — visible fade-through transition.
    // ---------------------------------------------------------
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const fadeLayer = carousel.querySelector('[data-carousel-fade-layer]');
        const previous = carousel.closest('section')?.querySelector('[data-carousel-prev]');
        const next = carousel.closest('section')?.querySelector('[data-carousel-next]');

        const AUTOPLAY_MS = 7000;

        // Intentionally more visible than the previous crossfade.
        const FADE_OUT_MS = 1200;
        const FADE_IN_MS = 1500;
        const FADE_IN_DELAY_MS = 280;
        const OVERLAY_MS = 1750;

        let active = 0;
        let autoplayTimer = null;
        let isTransitioning = false;

        if (slides.length === 0) {
            return;
        }

        const wait = (duration) => new Promise((resolve) => {
            window.setTimeout(resolve, duration);
        });

        const updateDots = () => {
            dots.forEach((dot, index) => {
                const selected = index === active;

                dot.setAttribute('aria-current', selected ? 'true' : 'false');
                dot.classList.toggle('bg-white', selected);
                dot.classList.toggle('bg-white/35', !selected);
            });
        };

        const updateDebugState = () => {
            carousel.dataset.carouselActive = String(active);
            carousel.dataset.carouselAutoplay = autoplayTimer ? 'running' : 'stopped';
            carousel.dataset.carouselTransition = isTransitioning ? 'running' : 'idle';
        };

        const preloadRemainingSlides = () => {
            slides.slice(1).forEach((slide) => {
                const image = slide.querySelector('img');

                if (!image || image.complete) {
                    return;
                }

                const preload = new Image();
                preload.decoding = 'async';
                preload.src = image.currentSrc || image.src;
            });
        };

        const initializeSlides = () => {
            carousel.classList.add('is-enhanced');

            slides.forEach((slide, index) => {
                const selected = index === 0;

                slide.hidden = false;
                slide.classList.toggle('is-active', selected);
                slide.setAttribute('aria-hidden', String(!selected));
            });

            active = 0;
            updateDots();
            updateDebugState();
        };

        const transitionTo = async (index) => {
            const nextIndex = (index + slides.length) % slides.length;

            if (nextIndex === active || isTransitioning) {
                return;
            }

            const outgoing = slides[active];
            const incoming = slides[nextIndex];
            const outgoingImage = outgoing.querySelector('img');
            const incomingImage = incoming.querySelector('img');

            isTransitioning = true;
            updateDebugState();

            incoming.hidden = false;

            outgoing.style.zIndex = '2';
            incoming.style.zIndex = '3';

            incoming.style.opacity = '0';
            incoming.classList.remove('is-active');

            /*
             * Reduced-motion users still get a gentle opacity dissolve,
             * but no image scaling/spatial motion.
             */
            const reduced = prefersReducedMotion();

            const outgoingAnimation = outgoing.animate(
                reduced
                    ? [
                        { opacity: 1 },
                        { opacity: 0 },
                    ]
                    : [
                        { opacity: 1, filter: 'brightness(1)' },
                        { opacity: 0, filter: 'brightness(.92)' },
                    ],
                {
                    duration: reduced ? 700 : FADE_OUT_MS,
                    easing: 'ease-in-out',
                    fill: 'forwards',
                },
            );

            let overlayAnimation = null;

            if (fadeLayer) {
                overlayAnimation = fadeLayer.animate(
                    [
                        { opacity: 0, offset: 0 },
                        { opacity: reduced ? 0.20 : 0.38, offset: 0.46 },
                        { opacity: 0, offset: 1 },
                    ],
                    {
                        duration: reduced ? 1000 : OVERLAY_MS,
                        easing: 'ease-in-out',
                        fill: 'forwards',
                    },
                );
            }

            await wait(reduced ? 120 : FADE_IN_DELAY_MS);

            const incomingAnimation = incoming.animate(
                [
                    { opacity: 0 },
                    { opacity: 1 },
                ],
                {
                    duration: reduced ? 900 : FADE_IN_MS,
                    easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                    fill: 'forwards',
                },
            );

            let incomingImageAnimation = null;

            if (!reduced && incomingImage) {
                incomingImageAnimation = incomingImage.animate(
                    [
                        { transform: 'scale(1.025)' },
                        { transform: 'scale(1)' },
                    ],
                    {
                        duration: 6200,
                        easing: 'ease-out',
                        fill: 'forwards',
                    },
                );
            }

            try {
                const animations = [
                    outgoingAnimation.finished,
                    incomingAnimation.finished,
                ];

                if (overlayAnimation) {
                    animations.push(overlayAnimation.finished);
                }

                await Promise.all(animations);
            } catch {
                // Normalization below guarantees a valid final state.
            }

            active = nextIndex;

            slides.forEach((slide, slideIndex) => {
                const selected = slideIndex === active;

                slide.classList.toggle('is-active', selected);
                slide.setAttribute('aria-hidden', String(!selected));
                slide.style.removeProperty('z-index');
                slide.style.removeProperty('opacity');
                slide.style.removeProperty('filter');
            });

            outgoingAnimation.cancel();
            incomingAnimation.cancel();
            overlayAnimation?.cancel();

            /*
             * Keep the long incoming image zoom running after the opacity
             * dissolve completes. It will be replaced on the next slide.
             */
            if (!incomingImageAnimation && outgoingImage) {
                outgoingImage.style.removeProperty('transform');
            }

            isTransitioning = false;
            updateDots();
            updateDebugState();
        };

        const stopAutoplay = () => {
            if (autoplayTimer !== null) {
                window.clearTimeout(autoplayTimer);
                autoplayTimer = null;
            }

            updateDebugState();
        };

        const scheduleNext = () => {
            stopAutoplay();

            if (slides.length < 2 || document.hidden) {
                return;
            }

            autoplayTimer = window.setTimeout(async () => {
                autoplayTimer = null;

                await transitionTo(active + 1);
                scheduleNext();
            }, AUTOPLAY_MS);

            updateDebugState();
        };

        const navigate = async (index) => {
            stopAutoplay();
            await transitionTo(index);
            scheduleNext();
        };

        previous?.addEventListener('click', () => {
            void navigate(active - 1);
        });

        next?.addEventListener('click', () => {
            void navigate(active + 1);
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                void navigate(index);
            });
        });

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoplay();
                return;
            }

            scheduleNext();
        });

        preloadRemainingSlides();
        initializeSlides();
        scheduleNext();
    });

    // ---------------------------------------------------------
    // Testimonial V9 — responsive 3-up desktop / 1-up mobile.
    // ---------------------------------------------------------
    document.querySelectorAll('[data-testimonial-slider]').forEach((slider) => {
        const track = slider.querySelector('[data-testimonial-track]');
        const pageSlides = track ? [...track.children] : [];
        const groups = pageSlides.map((slide) => slide.querySelector(':scope > div'));
        const cards = pageSlides.flatMap((slide) => [...slide.querySelectorAll('article')]);
        const dots = [...slider.querySelectorAll('[data-testimonial-dot]')];

        const AUTOPLAY_MS = 6500;
        const SLIDE_MS = 600;

        let desktopPage = 0;
        let mobileIndex = 0;
        let startX = 0;
        let autoplayTimer = null;

        if (!track || pageSlides.length === 0 || cards.length === 0) {
            return;
        }

        const isMobile = () => window.matchMedia('(max-width: 767px)').matches;

        const pageCount = pageSlides.length;
        const cardsPerPage = Math.max(1, Math.ceil(cards.length / pageCount));

        const setTransition = () => {
            const transition = prefersReducedMotion()
                ? 'none'
                : `transform ${SLIDE_MS}ms cubic-bezier(0.22, 1, 0.36, 1)`;

            track.style.transition = transition;

            groups.forEach((group) => {
                if (group) {
                    group.style.transition = transition;
                }
            });
        };

        const updateDots = (pageIndex) => {
            dots.forEach((dot, dotIndex) => {
                const active = dotIndex === pageIndex;

                dot.classList.toggle('bg-brand-green-600', active);
                dot.classList.toggle('bg-[#edf0f3]', !active);
                dot.setAttribute('aria-pressed', active ? 'true' : 'false');
            });
        };

        const setupCardInteraction = () => {
            cards.forEach((card) => {
                card.style.cursor = 'pointer';

                card.addEventListener('click', () => {
                    if (isMobile()) {
                        goToMobile(mobileIndex + 1);
                    } else {
                        goToDesktop(desktopPage + 1);
                    }

                    startAutoplay();
                });

                card.addEventListener('keydown', (event) => {
                    if (event.key !== 'Enter' && event.key !== ' ') {
                        return;
                    }

                    event.preventDefault();

                    if (isMobile()) {
                        goToMobile(mobileIndex + 1);
                    } else {
                        goToDesktop(desktopPage + 1);
                    }

                    startAutoplay();
                });
            });
        };

        const applyDesktopLayout = () => {
            groups.forEach((group) => {
                if (!group) {
                    return;
                }

                group.style.removeProperty('display');
                group.style.removeProperty('gap');
                group.style.removeProperty('transform');
            });

            cards.forEach((card) => {
                card.style.removeProperty('flex');
                card.style.removeProperty('width');
            });

            desktopPage = Math.min(
                pageCount - 1,
                Math.floor(mobileIndex / cardsPerPage),
            );

            track.style.transform = `translateX(-${desktopPage * 100}%)`;
            updateDots(desktopPage);
        };

        const applyMobileLayout = () => {
            groups.forEach((group) => {
                if (!group) {
                    return;
                }

                group.style.display = 'flex';
                group.style.flexWrap = 'nowrap';
                group.style.gap = '0px';
            });

            cards.forEach((card) => {
                card.style.flex = '0 0 100%';
                card.style.width = '100%';
            });

            mobileIndex = Math.min(
                cards.length - 1,
                desktopPage * cardsPerPage,
            );

            const groupIndex = Math.floor(mobileIndex / cardsPerPage);
            const localIndex = mobileIndex % cardsPerPage;

            track.style.transform = `translateX(-${groupIndex * 100}%)`;

            groups.forEach((group, index) => {
                if (!group) {
                    return;
                }

                group.style.transform = index === groupIndex
                    ? `translateX(-${localIndex * 100}%)`
                    : 'translateX(0%)';
            });

            updateDots(groupIndex);
        };

        const goToDesktop = (index) => {
            desktopPage = (index + pageCount) % pageCount;
            mobileIndex = desktopPage * cardsPerPage;

            track.style.transform = `translateX(-${desktopPage * 100}%)`;

            groups.forEach((group) => {
                if (group) {
                    group.style.transform = 'translateX(0%)';
                }
            });

            updateDots(desktopPage);
        };

        const goToMobile = (index) => {
            mobileIndex = (index + cards.length) % cards.length;

            const groupIndex = Math.floor(mobileIndex / cardsPerPage);
            const localIndex = mobileIndex % cardsPerPage;

            desktopPage = groupIndex;

            track.style.transform = `translateX(-${groupIndex * 100}%)`;

            groups.forEach((group, currentGroupIndex) => {
                if (!group) {
                    return;
                }

                if (currentGroupIndex === groupIndex) {
                    group.style.transform = `translateX(-${localIndex * 100}%)`;
                    return;
                }

                /*
                 * Reset inactive groups so the next group always starts from
                 * its first testimonial when entered from the opposite side.
                 */
                group.style.transform = 'translateX(0%)';
            });

            updateDots(groupIndex);
        };

        const stopAutoplay = () => {
            if (autoplayTimer !== null) {
                window.clearTimeout(autoplayTimer);
                autoplayTimer = null;
            }
        };

        const startAutoplay = () => {
            stopAutoplay();

            if (document.hidden || cards.length < 2) {
                return;
            }

            autoplayTimer = window.setTimeout(() => {
                autoplayTimer = null;

                if (isMobile()) {
                    goToMobile(mobileIndex + 1);
                } else {
                    goToDesktop(desktopPage + 1);
                }

                startAutoplay();
            }, AUTOPLAY_MS);
        };

        const syncResponsiveLayout = () => {
            setTransition();

            if (isMobile()) {
                applyMobileLayout();
            } else {
                applyDesktopLayout();
            }
        };

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                desktopPage = index;

                if (isMobile()) {
                    goToMobile(index * cardsPerPage);
                } else {
                    goToDesktop(index);
                }

                startAutoplay();
            });
        });

        slider.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                if (isMobile()) {
                    goToMobile(mobileIndex - 1);
                } else {
                    goToDesktop(desktopPage - 1);
                }

                startAutoplay();
            }

            if (event.key === 'ArrowRight') {
                if (isMobile()) {
                    goToMobile(mobileIndex + 1);
                } else {
                    goToDesktop(desktopPage + 1);
                }

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

                if (isMobile()) {
                    goToMobile(distance < 0 ? mobileIndex + 1 : mobileIndex - 1);
                } else {
                    goToDesktop(distance < 0 ? desktopPage + 1 : desktopPage - 1);
                }

                startAutoplay();
            },
            { passive: true },
        );

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoplay();
                return;
            }

            startAutoplay();
        });

        let resizeTimer;
        window.addEventListener('resize', () => {
            window.clearTimeout(resizeTimer);

            resizeTimer = window.setTimeout(() => {
                syncResponsiveLayout();
            }, 120);
        });

        setupCardInteraction();
        syncResponsiveLayout();
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

    const startRevealObserver = () => {
        uniqueRevealElements.forEach((element) => {
            observer.observe(element);
        });
    };

    // Two animation frames ensure the initial opacity/translate state
    // has been painted before an already-visible element is revealed.
    requestAnimationFrame(() => {
        requestAnimationFrame(startRevealObserver);
    });
});
