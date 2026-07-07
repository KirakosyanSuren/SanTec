import('./components/admin/image-upload.js')
import('./components/admin/navbar.js')
import('./components/select.js')

// document.getElementById('filterForm').addEventListener('submit', function () {
//     this.querySelectorAll('input, select').forEach(function (field) {
//         if (field.value === '') {
//             field.removeAttribute('name');
//         }
//     });
// });

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
