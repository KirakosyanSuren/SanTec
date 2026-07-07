document.querySelectorAll('.image-upload').forEach(upload => {

    const input = upload.querySelector('input[type="file"]');
    const grid = upload.querySelector('.preview-grid');
    const mainInput = upload.querySelector('.main-image-input');

    const uploadType = upload.dataset.type;

    const isMultiple =
        input.hasAttribute('multiple');

    const hasMainImage =
        uploadType === 'image' &&
        !!mainInput;

    let files = [];
    let mainIndex = null;

    input.addEventListener('change', e => {

        files = Array.from(e.target.files);

        if (
            isMultiple &&
            hasMainImage &&
            files.length &&
            mainIndex === null
        ) {
            mainIndex = 0;
            mainInput.value = 0;
        }

        render();

    });

    function render() {

        grid.innerHTML = '';

        files.forEach((file, index) => {

            const item =
                document.createElement('div');

            item.classList.add('preview-item');

            if (
                isMultiple &&
                hasMainImage &&
                index === mainIndex
            ) {
                item.classList.add('is-main');
            }

            let actions = `
                <button
                    type="button"
                    class="preview-btn delete"
                    data-index="${index}"
                >
                    <i class="fa-solid fa-trash"></i>
                </button>
            `;

            if (
                isMultiple &&
                hasMainImage
            ) {

                actions = `
                    <button
                        type="button"
                        class="preview-btn main"
                        data-index="${index}"
                    >
                        <i class="fa-solid fa-star"></i>
                    </button>

                    <button
                        type="button"
                        class="preview-btn delete"
                        data-index="${index}"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </button>
                `;
            }

            let previewContent = '';

            if (uploadType === 'image') {

                previewContent = `
                    <img
                        src="${URL.createObjectURL(file)}"
                        alt=""
                    >
                `;

            } else {
                const pdfUrl = URL.createObjectURL(file);
                const openPdfText = upload.dataset.openPdf

                previewContent = `
                    <div class="pdf-preview">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>${file.name}</span>

                        <a
                            href="${pdfUrl}"
                            target="_blank"
                            class="pdf-open-btn"
                        >
                            ${openPdfText}
                        </a>
                    </div>
                `;
            }

            item.innerHTML = `
                ${previewContent}

                <div class="preview-actions">
                    ${actions}
                </div>
            `;

            grid.appendChild(item);

        });

        bindEvents();
    }

    function bindEvents() {

        upload
            .querySelectorAll('.preview-btn.delete')
            .forEach(btn => {

                btn.addEventListener('click', () => {

                    const index =
                        Number(btn.dataset.index);

                    if (
                        isMultiple &&
                        hasMainImage &&
                        index === mainIndex
                    ) {
                        return;
                    }

                    files.splice(index, 1);

                    if (
                        isMultiple &&
                        hasMainImage &&
                        mainIndex !== null &&
                        index < mainIndex
                    ) {
                        mainIndex--;
                    }

                    if (!files.length) {

                        mainIndex = null;

                        if (hasMainImage) {
                            mainInput.value = '';
                        }

                    }

                    const dt =
                        new DataTransfer();

                    files.forEach(file => {
                        dt.items.add(file);
                    });

                    input.files = dt.files;

                    if (hasMainImage) {
                        mainInput.value =
                            mainIndex ?? '';
                    }

                    render();

                });

            });

        if (
            !isMultiple ||
            !hasMainImage
        ) {
            return;
        }

        upload
            .querySelectorAll('.preview-btn.main')
            .forEach(btn => {

                btn.addEventListener('click', () => {

                    mainIndex =
                        Number(btn.dataset.index);

                    mainInput.value =
                        mainIndex;

                    render();

                });

            });

    }

});
