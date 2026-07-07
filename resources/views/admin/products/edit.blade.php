<x-admin :title="__('admin.navbar.product')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <a href="{{ route('admin.products.index') }}">
                    {{ __('admin.navbar.product') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.common.edit') }}</span>
            </div>

        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.product.name')"
                    name="name"
                    :placeholder="__('admin.product.name')"
                    :value="$product->name"
                />

                <x-ui.select
                    :label="__('admin.product.brand')"
                    name="brand_id"
                    :options="$brands"
                    :multiple="false"
                    :selected="old('brand_id', $product->brand_id ?? null)"
                    :showAllOption="true"
                />

                <x-ui.select
                    :label="__('admin.product.category')"
                    name="category_id"
                    :options="$categories"
                    :multiple="false"
                    :multilanguage="true"
                    :selected="old('category_id', $product->category_id ?? null)"
                    :showAllOption="true"
                />

                <x-admin.ui.image-upload
                    :label="__('admin.product.product_passport')"
                    :text="__('admin.common.upload_passport')"
                    name="passport"
                    type="file"
                    :images="$product->passport ? [$product->passport] : []"
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
