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

                <span>{{ __('admin.common.edit') }}</span>
            </div>

        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.brands.update', $brand->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.brands.table.name')"
                    name="name"
                    :placeholder="__('admin.brands.table.name')"
                    :value="$brand->name"
                />

                <x-ui.input
                    label="Slug"
                    name="slug"
                    placeholder="Slug"
                    :value="$brand->slug"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_hy')"
                    name="description_hy"
                    :placeholder="__('admin.about.description_hy')"
                    :value="$brand->description['hy']"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_ru')"
                    name="description_ru"
                    :placeholder="__('admin.about.description_ru')"
                    :value="$brand->description['ru']"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_en')"
                    name="description_en"
                    :placeholder="__('admin.about.description_en')"
                    :value="$brand->description['en']"
                />

                <x-admin.ui.image-upload
                    name="logo"
                    :label="__('admin.brands.table.logo')"
                    :images="$brand->image ? [$brand->image] : []"
                />

                <x-admin.ui.image-upload
                    :label="__('admin.brands.table.certificates')"
                    :text="__('admin.common.upload_certificates')"
                    name="certificates"
                    type="file"
                    multiple
                    :images="$brand->certificates"
                />


            </div>

            <button
                type="submit"
                class="btn-primary h-60"
            >
                {{ __('admin.common.save') }}
            </button>

        </form>
    </div>

    <x-ui.error-alert />

</x-admin>
