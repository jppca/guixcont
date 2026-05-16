// =====================================
// Toggle Password
// =====================================
document
    .getElementById('togglePassword')
    ?.addEventListener('click', function () {

        const password =
            document.getElementById('password');

        const eyeIcon =
            document.getElementById('eyeIcon');

        if (password.type === 'password') {

            password.type = 'text';

            eyeIcon.innerHTML = `
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M3 3l18 18"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M10.477 10.488A3 3 0 0 0 13.5 13.5"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M9.88 4.24A9.77 9.77 0 0 1 12 4
                       c6 0 9.75 8 9.75 8
                       a18.88 18.88 0 0 1-4.293 5.774"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M6.228 6.228A18.64 18.64 0 0 0 2.25 12
                       s3.75 8 9.75 8
                       a9.77 9.77 0 0 0 5.293-1.54"
                />
            `;

        } else {

            password.type = 'password';

            eyeIcon.innerHTML = `
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M2.25 12s3.75-7.5 9.75-7.5
                       S21.75 12 21.75 12
                       18 19.5 12 19.5
                       2.25 12 2.25 12Z"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M12 15.75A3.75 3.75 0 1 0
                       12 8.25a3.75 3.75 0 0 0 0 7.5Z"
                />
            `;

        }

    });

// =====================================
// Theme Toggle
// =====================================
const html =
    document.documentElement;

const themeToggle =
    document.getElementById('themeToggle');

const themeIcon =
    document.getElementById('themeIcon');

const savedTheme =
    localStorage.getItem('theme');

if (savedTheme) {

    html.setAttribute(
        'data-bs-theme',
        savedTheme
    );

}

function updateThemeIcon(theme) {

    if (!themeIcon) return;

    if (theme === 'dark') {

        themeIcon.innerHTML = `
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M12 3v2.25
                   M12 18.75V21
                   M4.22 4.22l1.59 1.59
                   M18.19 18.19l1.59 1.59
                   M3 12h2.25
                   M18.75 12H21
                   M4.22 19.78l1.59-1.59
                   M18.19 5.81l1.59-1.59"
            />

            <circle
                cx="12"
                cy="12"
                r="4"
                stroke="currentColor"
                stroke-width="1.5"
            />
        `;

    } else {

        themeIcon.innerHTML = `
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M21 12.79A9 9 0 1 1 11.21 3
                   7 7 0 0 0 21 12.79Z"
            />
        `;

    }

}

updateThemeIcon(
    html.getAttribute('data-bs-theme') || 'light'
);

themeToggle?.addEventListener('click', () => {

    const currentTheme =
        html.getAttribute('data-bs-theme');

    const newTheme =
        currentTheme === 'dark'
            ? 'light'
            : 'dark';

    html.setAttribute(
        'data-bs-theme',
        newTheme
    );

    localStorage.setItem(
        'theme',
        newTheme
    );

    updateThemeIcon(newTheme);

});
