function passwordToggle() {
    document.querySelectorAll('.password-wrap').forEach((wrap) => {
        const input = wrap.querySelector('input');
        const toggle = wrap.querySelector('.password-toggle');

        if (!input || !toggle) return;

        toggle.addEventListener('click', () => {
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            toggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            toggle.setAttribute('title', isHidden ? 'Hide password' : 'Show password');
            toggle.classList.toggle('is-visible', isHidden);
        });
    });
}

function dismissSuccessAlert() {
    const alert = document.querySelector('.alert-success');

    if (!alert) return;

    setTimeout(() => {
        alert.classList.add('is-hidden');
        setTimeout(() => alert.remove(), 300);
    }, 4000);
}

function initApp() {
    passwordToggle();
    dismissSuccessAlert();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp);
} else {
    initApp();
}
