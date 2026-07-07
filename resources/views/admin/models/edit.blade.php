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

                <span>{{ __('admin.common.edit') }}</span>
            </div>

        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.models.update', $model->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">
                <x-ui.input
                    :label="__('admin.model.name')"
                    name="name"
                    :placeholder="__('admin.model.name')"
                    :value="$model->name"
                />

                <x-ui.select
                    id="product-select"
                    :label="__('admin.model.product')"
                    name="product_id"
                    :options="$products"
                    :multiple="false"
                    :showAllOption="true"
                    :selected="old('product_id', $model->product_id ?? null)"

                />

                <x-ui.input
                    :label="__('admin.model.price')"
                    name="price"
                    :placeholder="__('admin.model.price')"
                    type="number"
                    :value="(float) $model->price"
                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_hy')"
                    name="characteristic_hy"
                    :placeholder="__('admin.model.characteristic_hy')"
                    :value="$model->characteristic['hy']"
                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_ru')"
                    name="characteristic_ru"
                    :placeholder="__('admin.model.characteristic_ru')"
                    :value="$model->characteristic['ru']"
                />

                <x-ui.textarea
                    :label="__('admin.model.characteristic_en')"
                    name="characteristic_en"
                    :placeholder="__('admin.model.characteristic_en')"
                    :value="$model->characteristic['en']"
                />

                <x-admin.ui.image-upload
                    :label="__('admin.model.image')"
                    :text="__('admin.common.upload_image')"
                    :selectableMain="true"
                    name="image"
                    type="image"
                    multiple
                    :images="$model->images"
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
