<x-admin :title="__('admin.navbar.category')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <a href="{{ route('admin.categories.index') }}">
                    {{ __('admin.navbar.category') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.common.edit') }}</span>
            </div>
        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.categories.update', $category->id) }}"
            method="POST"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.category.title_hy')"
                    name="title_hy"
                    :placeholder="__('admin.category.title_hy')"
                    :value="$category->name['hy']"
                />

                <x-ui.input
                    :label="__('admin.category.title_ru')"
                    name="title_ru"
                    :placeholder="__('admin.category.title_ru')"
                    :value="$category->name['ru']"
                />

                <x-ui.input
                    :label="__('admin.category.title_en')"
                    name="title_en"
                    :placeholder="__('admin.category.title_en')"
                    :value="$category->name['en']"
                />

                <x-ui.select
                    :label="__('admin.navbar.brands')"
                    name="brand_id"
                    :options="$brands"
                    :selected="old('brand_id', $category->brands()->pluck('id')->toArray())"
                    :multiple="true"
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

</x-admin>
