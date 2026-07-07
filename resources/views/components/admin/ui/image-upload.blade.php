@props([
    'label' => '',
    'text' => '',
    'name',
    'multiple' => false,
    'selectableMain' => false,
    'images' => [],
    'type' => 'image', // image | file
])

<div class="form-group">

    <label>
        {{ $label }}
    </label>

    <div
        class="image-upload"
        data-type="{{ $type }}"
        data-open-pdf="{{ __('admin.common.open_pdf') }}"
        data-multiple="{{ $multiple ? 'true' : 'false' }}"
        data-main="{{ $selectableMain ? 'true' : 'false' }}"
    >

        <input
            type="file"
            id="{{ $name }}"
            name="{{ $multiple ? $name . '[]' : $name }}"
            accept="{{ $type === 'image' ? 'image/*' : '.pdf' }}"
            {{ $multiple ? 'multiple' : '' }}
        >

        @if($selectableMain && $type === 'image')
            <input
                type="hidden"
                name="main_image"
                class="main-image-input"
            >
        @endif

        <label
            for="{{ $name }}"
            class="upload-area"
        >
            <i class="fa-solid fa-cloud-arrow-up"></i>

            <span>
                {{ $text }}
            </span>
        </label>

        <div class="preview-grid">

            @foreach($images as $image)

                <div
                    class="preview-item {{ $image->is_main ?? false ? 'is-main' : '' }}"
                    data-existing="{{ $image->id }}"
                >

                    @if($type === 'image')

                        <img
                            src="{{ Storage::url($image->path) }}"
                            alt=""
                        >

                    @else

                        <div class="pdf-preview">

                            <i class="fa-solid fa-file-pdf"></i>

                            <span>
                                {{ basename($image->name) }}
                            </span>

                            <a
                                href="{{ Storage::url($image->path) }}"
                                target="_blank"
                                class="pdf-open-btn"
                            >
                                {{ __('admin.common.open_pdf') }}
                            </a>

                        </div>
                    @endif

                </div>

            @endforeach

        </div>

    </div>

    @error($name)
        <p class="error-text">
            {{ $message }}
        </p>
    @enderror

</div>
