<x-admin :title="__('admin.navbar.brands')">
    <x-admin.ui.table
        :title="__('admin.navbar.brands')"
        :create-text="__('admin.common.create')"
        create-url="admin.brands.create"
    >

        <table class="admin-table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin.brands.table.name') }}</th>
                <th>Slug</th>
                <th>{{ __('admin.about.description_hy') }}</th>
                <th>{{ __('admin.about.description_ru') }}</th>
                <th>{{ __('admin.about.description_en') }}</th>
                <th>{{ __('admin.brands.table.status') }}</th>
                <th>{{ __('admin.common.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($brands as $brand)

                <tr>

                    <td>
                        {{ $brands->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $brand->name }}
                    </td>

                    <td>
                        {{ $brand->slug }}
                    </td>

                    <td>
                        {{ $brand->description['hy'] }}
                    </td>

                    <td>
                        {{ $brand->description['ru'] }}
                    </td>

                    <td>
                        {{ $brand->description['en'] }}
                    </td>

                    <td>
                        @if($brand->is_active)
                            <span class="status-badge active">
                                {{ __('admin.common.active') }}
                            </span>
                        @else

                            <span class="status-badge inactive">
                                {{ __('admin.common.inactive') }}
                            </span>
                        @endif
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('admin.brands.edit', [
                                        app()->getLocale(),
                                        $brand
                                    ])
                                }}"
                                class="action-btn edit-btn"
                                title="{{ __('admin.common.edit') }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('admin.brands.changeStatus', [app()->getLocale(), $brand]) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="action-btn status-btn"
                                    title="{{ __('admin.common.change_status') }}"
                                    onclick="return confirm('{{ __('admin.confirmations.change_status') }}')"
                                >
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>
    </x-admin.ui.table>

    <x-ui.pagination
        :paginator="$brands"
    />

</x-admin>
