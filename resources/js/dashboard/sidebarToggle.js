document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('#sidebar-toggle');
    const sidebar = document.querySelector('aside');

    if (!toggleButton || !sidebar) return;

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
    });
});

