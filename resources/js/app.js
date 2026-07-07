import('./layouts/header.js')
import('./components/stats.js')
import('./components/gallery.js')
import('./components/select.js')

const form = document.getElementById('filterForm');

if (form) {
    form.addEventListener('submit', () => {
        form.querySelectorAll('input, select').forEach((field) => {
            if (field.value.trim() === '') {
                field.removeAttribute('name');
            }
        });
    });
}

