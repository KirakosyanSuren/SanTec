<x-admin :title="__('admin.navbar.contact_data')">

    <div class="page-header">
        <div>
            <div class="breadcrumbs">
                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin.navbar.dashboard') }}
                </a>

                <span>/</span>

                <span>{{ __('admin.navbar.contact_data') }}</span>
            </div>

        </div>

    </div>

    <div class="form-card">

        <form
            action="{{ route('admin.contact.update', $contact->id) }}"
            method="POST"
        >
            @csrf
            @method('PATCH')

            <div class="form-grid">

                <x-ui.input
                    :label="__('admin.contact.email')"
                    name="email"
                    :placeholder="__('admin.contact.email')"
                    :value="$contact->email"
                />

                <x-ui.input
                    :label="__('admin.contact.phone')"
                    name="phone"
                    :placeholder="__('admin.contact.phone')"
                    :value="$contact->phone"
                />

                <x-ui.input
                    :label="__('admin.contact.address_hy')"
                    name="address_hy"
                    :placeholder="__('admin.contact.address_hy')"
                    :value="$contact->address['hy']"
                />

                <x-ui.input
                    :label="__('admin.contact.address_ru')"
                    name="address_ru"
                    :placeholder="__('admin.contact.address_ru')"
                    :value="$contact->address['ru']"
                />

                <x-ui.input
                    :label="__('admin.contact.address_en')"
                    name="address_en"
                    :placeholder="__('admin.contact.address_en')"
                    :value="$contact->address['en']"
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
