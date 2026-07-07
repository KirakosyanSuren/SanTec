<x-admin :title="__('admin.navbar.brands')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <a href="{{ route('admin.brands.index') }}">
                    {{ __('admin.navbar.brands') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.common.create') }}</span>
            </div>
        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.brands.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.brands.table.name')"
                    name="name"
                    :placeholder="__('admin.brands.table.name')"
                />

                <x-ui.input
                    label="Slug"
                    name="slug"
                    placeholder="Slug"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_hy')"
                    name="description_hy"
                    :placeholder="__('admin.about.description_hy')"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_ru')"
                    name="description_ru"
                    :placeholder="__('admin.about.description_ru')"

                />

                <x-ui.textarea
                    :label="__('admin.about.description_en')"
                    name="description_en"
                    :placeholder="__('admin.about.description_en')"

                />

                <x-admin.ui.image-upload
                    :label="__('admin.brands.table.logo')"
                    :text="__('admin.common.upload_image')"
                    name="logo"
                />

                <x-admin.ui.image-upload
                    :label="__('admin.brands.table.certificates')"
                    :text="__('admin.common.upload_certificates')"
                    name="certificates"
                    type="file"
                    multiple
                />

            </div>

            <button
                type="submit"
                class="btn-primary h-60"
            >
                {{ __('admin.common.create') }}
            </button>

        </form>
    </div>

    <x-ui.error-alert />

</x-admin>
