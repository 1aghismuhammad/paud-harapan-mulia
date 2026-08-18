(() => {
    const initBackToTop = () => {
        const button = document.querySelector('[data-back-to-top]');

        if (!button || button.dataset.backToTopReady === 'true') {
            return;
        }

        button.dataset.backToTopReady = 'true';

        let animationFrame = null;
        let cancelled = false;

        const reduceMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

        const easeInOutSine = (progress) => (
            -(Math.cos(Math.PI * progress) - 1) / 2
        );

        const stopAnimation = () => {
            cancelled = true;

            if (animationFrame !== null) {
                window.cancelAnimationFrame(animationFrame);
                animationFrame = null;
            }

            document.documentElement.style.removeProperty('scroll-behavior');
        };

        const animateToTop = () => {
            if (animationFrame !== null) {
                return;
            }

            const startY = window.scrollY || document.documentElement.scrollTop || 0;

            if (startY <= 0) {
                return;
            }

            cancelled = false;

            /*
             * Normal motion is intentionally long enough to be visually perceived.
             * Reduced-motion still avoids an abrupt teleport, but uses a shorter,
             * gentler duration without decorative effects.
             */
            const duration = reduceMotionQuery.matches
                ? 1600
                : Math.min(5200, Math.max(3400, 3000 + startY * 0.16));

            const startedAt = performance.now();
            const root = document.documentElement;
            const previousInlineScrollBehavior = root.style.scrollBehavior;

            root.style.scrollBehavior = 'auto';

            const finish = () => {
                if (!cancelled) {
                    window.scrollTo(0, 0);
                }

                root.style.scrollBehavior = previousInlineScrollBehavior;
                animationFrame = null;
            };

            const step = (timestamp) => {
                if (cancelled) {
                    finish();
                    return;
                }

                const elapsed = timestamp - startedAt;
                const progress = Math.min(elapsed / duration, 1);
                const eased = easeInOutSine(progress);
                const nextY = startY * (1 - eased);

                window.scrollTo(0, nextY);

                if (progress < 1) {
                    animationFrame = window.requestAnimationFrame(step);
                    return;
                }

                finish();
            };

            animationFrame = window.requestAnimationFrame(step);
        };

        button.addEventListener('click', animateToTop);

        /*
         * Let the visitor take control immediately if they manually scroll
         * while the automatic trip to the top is running.
         */
        window.addEventListener('wheel', () => {
            if (animationFrame !== null) {
                stopAnimation();
            }
        }, { passive: true });

        window.addEventListener('touchstart', () => {
            if (animationFrame !== null) {
                stopAnimation();
            }
        }, { passive: true });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBackToTop, { once: true });
        return;
    }

    initBackToTop();
})();
