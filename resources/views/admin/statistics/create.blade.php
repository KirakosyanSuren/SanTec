<x-admin :title="__('admin.navbar.company_statistics')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <a href="{{ route('admin.statistics.index') }}">
                    {{ __('admin.navbar.company_statistics') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.common.create') }}</span>
            </div>
        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.statistics.store') }}"
            method="POST"
        >
            @csrf

            <div class="form-grid">

                <x-ui.input
                    type="number"
                    min="0"
                    name="value"
                    :label="__('admin.statistics.table.value')"
                    :placeholder="__('admin.statistics.table.value')"
                />

                <x-ui.input
                    :label="__('admin.statistics.table.title_hy')"
                    name="title_hy"
                    :placeholder="__('admin.statistics.table.title_hy')"
                />

                <x-ui.input
                    :label="__('admin.statistics.table.title_ru')"
                    name="title_ru"
                    :placeholder="__('admin.statistics.table.title_ru')"
                />

                <x-ui.input
                    :label="__('admin.statistics.table.title_en')"
                    name="title_en"
                    :placeholder="__('admin.statistics.table.title_en')"
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

</x-admin>
