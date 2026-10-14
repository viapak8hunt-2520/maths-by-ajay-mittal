import { initScrollReveal } from './motion';

document.addEventListener('DOMContentLoaded', () => {
    const mobileToggle = document.querySelector('[data-mobile-nav-toggle]');
    const mobilePanel = document.querySelector('[data-mobile-nav-panel]');

    if (mobileToggle && mobilePanel) {
        mobileToggle.addEventListener('click', () => {
            const expanded = mobileToggle.getAttribute('aria-expanded') === 'true';
            mobileToggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            mobilePanel.classList.toggle('hidden', expanded);
        });
    }

    document.querySelectorAll('[data-accordion-trigger]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const panel = trigger.nextElementSibling;
            const expanded = trigger.getAttribute('aria-expanded') === 'true';
            trigger.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            panel?.classList.toggle('hidden', expanded);
        });

        trigger.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                trigger.click();
            }
        });
    });

    initScrollReveal({
        autoRevealWithin: '#main-content',
        autoRevealSelector: 'section, .card',
    });
});
