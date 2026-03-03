document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.sidebar-link');
    const currentUrl = window.location.pathname;

    links.forEach((link) => {
        const href = link.getAttribute('href');
        if (href && currentUrl.startsWith(href)) {
            link.classList.add('is-active');
        }
    });
});

