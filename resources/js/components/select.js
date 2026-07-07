function initMultiSelect(select) {

    const trigger = select.querySelector('.multi-select-trigger');
    const dropdown = select.querySelector('.multi-select-dropdown');
    const inputs = dropdown.querySelectorAll('input');
    const selectedItems = select.querySelector('.selected-items');

    const multiple = select.dataset.multiple === 'true';

    if (!trigger.dataset.initialized) {

        trigger.dataset.initialized = "true";

        trigger.addEventListener('click', () => {
            select.classList.toggle('active');
        });

        document.addEventListener('click', e => {
            if (!select.contains(e.target)) {
                select.classList.remove('active');
            }
        });
    }

    function render() {

        selectedItems.innerHTML = '';

        const selected = [...inputs].filter(i => i.checked);

        selected.forEach(input => {

            if (multiple) {

                const tag = document.createElement('div');

                tag.className = 'selected-tag';

                tag.innerHTML = `
                    <span>${input.nextElementSibling.textContent}</span>
                    <i class="fa-solid fa-xmark"></i>
                `;

                tag.querySelector('i').addEventListener('click', e => {

                    e.stopPropagation();

                    input.checked = false;

                    render();

                });

                selectedItems.appendChild(tag);

            } else {

                selectedItems.innerHTML = `
                    <span>${input.nextElementSibling.textContent}</span>
                `;

                select.classList.remove('active');

            }

        });

    }

    inputs.forEach(input => {

        input.addEventListener('change', function () {

            render();


            // Только для model_select
            if (select.id === 'model_select' && this.checked) {
                window.location.href = `/${locale}/product/${this.dataset.slug}`;
            }

        });

    });

    render();
}

document.querySelectorAll('.multi-select').forEach(initMultiSelect);


// =========================
// Загрузка категорий
// =========================

const brandSelect = document.getElementById('brand-select');
const categorySelect = document.getElementById('category-select');

if (brandSelect && categorySelect) {

    const brandInputs = brandSelect.querySelectorAll('input');

    brandInputs.forEach(input => {

        input.addEventListener('change', async function () {

            try {

                const brandId = this.value;

                const response = await fetch(`/${locale}/admin/categories/by-brand/${brandId}`);

                const categories = await response.json();

                const dropdown = categorySelect.querySelector('.multi-select-dropdown');

                const placeholder = categorySelect.dataset.placeholder;

                dropdown.innerHTML = `
                    <label class="multi-option">
                        <input
                            class="select_checkbox"
                            type="radio"
                            name="category_id"
                            value=""
                            checked
                        >
                        <span>${placeholder}</span>
                    </label>
                `;

                categories.forEach(category => {

                    dropdown.insertAdjacentHTML('beforeend', `
                        <label class="multi-option">
                            <input
                                class="select_checkbox"
                                type="radio"
                                name="category_id"
                                value="${category.id}"
                            >
                            <span>${category.name[locale]}</span>
                        </label>
                    `);

                });

                initMultiSelect(categorySelect);

            } catch (e) {

                console.error(e);

            }

        });

    });

}
