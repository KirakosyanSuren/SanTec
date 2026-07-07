<x-admin :title="__('admin.navbar.about_us')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.navbar.about_us') }}</span>
            </div>

        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.about.update', $about->id) }}"
            method="POST"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.about.title_hy')"
                    name="title_hy"
                    :placeholder="__('admin.about.title_hy')"
                    :value="$about->title['hy']"
                />

                <x-ui.input
                    :label="__('admin.about.title_ru')"
                    name="title_ru"
                    :placeholder="__('admin.about.title_ru')"
                    :value="$about->title['ru']"
                />

                <x-ui.input
                    :label="__('admin.about.title_en')"
                    name="title_en"
                    :placeholder="__('admin.about.title_en')"
                    :value="$about->title['en']"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_hy')"
                    name="description_hy"
                    :value="$about->description['hy']"
                    :placeholder="__('admin.about.description_hy')"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_ru')"
                    name="description_ru"
                    :value="$about->description['ru']"
                    :placeholder="__('admin.about.description_ru')"
                />

                <x-ui.textarea
                    :label="__('admin.about.description_en')"
                    name="description_en"
                    :value="$about->description['en']"
                    :placeholder="__('admin.about.description_en')"
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
