<x-admin :title="__('admin.navbar.model')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <a href="{{ route('admin.models.index') }}">
                    {{ __('admin.navbar.model') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.common.create') }}</span>
            </div>
        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.models.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.model.name')"
                    name="name"
                    :placeholder="__('admin.model.name')"
                />

                <x-ui.select
                    id="product-select"
                    :label="__('admin.model.product')"
                    name="product_id"
                    :options="$products"
                    :multiple="false"
                    :showAllOption="true"
                    :selected="old('product_id')"
                />

                <x-ui.input
                    :label="__('admin.model.price')"
                    name="price"
                    :placeholder="__('admin.model.price')"
                    type="number"
                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_hy')"
                    name="characteristic_hy"
                    :placeholder="__('admin.model.characteristic_hy')"
                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_ru')"
                    name="characteristic_ru"
                    :placeholder="__('admin.model.characteristic_ru')"

                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_en')"
                    name="characteristic_en"
                    :placeholder="__('admin.model.characteristic_en')"
                />

                <x-admin.ui.image-upload
                    :label="__('admin.model.image')"
                    :text="__('admin.common.upload_image')"
                    :selectableMain="true"
                    name="image"
                    type="image"
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
