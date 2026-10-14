function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

export function initScrollReveal(options = {}) {
    const root = options.root ?? document;
    const selector = options.selector ?? '[data-reveal]';

    const autoRoot = options.autoRevealWithin;
    if (autoRoot) {
        const container = typeof autoRoot === 'string' ? root.querySelector(autoRoot) : autoRoot;
        if (container) {
            const candidates = container.querySelectorAll(options.autoRevealSelector ?? 'section, .card, .admin-card, .admin-card-flush, .admin-stat, .admin-page-header');
            candidates.forEach((element, index) => {
                if (element.hasAttribute('data-no-reveal') || element.closest('[data-no-reveal]') || element.hasAttribute('data-reveal')) {
                    return;
                }
                element.setAttribute('data-reveal', '');
                element.style.setProperty('--reveal-delay', `${Math.min(index * 55, 385)}ms`);
            });
        }
    }

    const elements = root.querySelectorAll(selector);

    if (prefersReducedMotion()) {
        elements.forEach((element) => element.classList.add('is-revealed'));

        return;
    }

    if (! elements.length) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }
                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target);
            });
        },
        {
            threshold: options.threshold ?? 0.08,
            rootMargin: options.rootMargin ?? '0px 0px -5% 0px',
        },
    );

    elements.forEach((element) => observer.observe(element));
}
