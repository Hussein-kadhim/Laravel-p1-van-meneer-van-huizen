document.addEventListener('DOMContentLoaded', () => {
    // ===== Hamburger menu toggle =====
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const navMenu = document.getElementById('nav-menu');

    if (hamburgerBtn && navMenu) {
        const toggleMenu = (open) => {
            const shouldOpen = open !== undefined ? open : !navMenu.classList.contains('is-open');
            hamburgerBtn.classList.toggle('is-active', shouldOpen);
            navMenu.classList.toggle('is-open', shouldOpen);
            hamburgerBtn.setAttribute('aria-expanded', shouldOpen ? 'true' : 'false');
        };

        hamburgerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        // Sluit menu bij klik buiten het menu
        document.addEventListener('click', (e) => {
            if (navMenu.classList.contains('is-open') && !navMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
                toggleMenu(false);
            }
        });

        // Sluit menu bij Escape toets
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navMenu.classList.contains('is-open')) {
                toggleMenu(false);
                hamburgerBtn.focus();
            }
        });

        // Sluit menu bij klik op een link
        navMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                toggleMenu(false);
            });
        });

        // Sluit automatisch bij vergroten venster boven breakpoint (900px)
        window.addEventListener('resize', () => {
            if (window.innerWidth > 900 && navMenu.classList.contains('is-open')) {
                toggleMenu(false);
            }
        });
    }

    // ===== Flash Alerts auto-dismiss =====
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach((alert) => {
        // Voeg sluitknop (x) toe als die nog niet bestaat
        if (!alert.querySelector('.alert-close')) {
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'alert-close';
            closeBtn.innerHTML = '&times;';
            closeBtn.setAttribute('aria-label', 'Sluiten');
            closeBtn.addEventListener('click', () => {
                hideAlert(alert);
            });
            alert.appendChild(closeBtn);
        }

        // Verdwijn automatisch na 4 seconden
        setTimeout(() => {
            hideAlert(alert);
        }, 4000);
    });

    function hideAlert(alert) {
        if (!alert || !alert.parentElement) {
            return;
        }
        alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-6px)';
        setTimeout(() => {
            if (alert.parentElement) {
                alert.remove();
            }
        }, 400);
    }
});
