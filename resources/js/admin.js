import { initScrollReveal } from './motion';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('adminShell', () => ({
        sidebarOpen: false,
        toggleSidebar() {
            this.sidebarOpen = ! this.sidebarOpen;
        },
    }));

    window.Alpine.data('repeatableRows', (initialRows, emptyRow) => ({
        rows: (initialRows?.length ? initialRows : [structuredClone(emptyRow)]),
        add() {
            this.rows.push(structuredClone(emptyRow));
        },
        remove(index) {
            if (this.rows.length <= 1) {
                this.rows[0] = structuredClone(emptyRow);

                return;
            }
            this.rows.splice(index, 1);
        },
    }));
});

document.addEventListener('DOMContentLoaded', () => {
    const dashboard = document.querySelector('[data-admin-dashboard]');
    if (! dashboard) {
        return;
    }

    initScrollReveal({
        autoRevealWithin: dashboard,
        autoRevealSelector: '.admin-card, .admin-card-flush',
    });
});
