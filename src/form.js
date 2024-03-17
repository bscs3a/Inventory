window.addEventListener('DOMContentLoaded', (event) => {
    const form = document.querySelector('form');
    const pathSegments = window.location.pathname.split('/');
    const rootFolder = pathSegments.length > 1 ? pathSegments[1] : '';
    const existingAction = form.getAttribute('action');
    form.action = `/${rootFolder}${existingAction}`;
});