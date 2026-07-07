<x-admin :title="__('admin.navbar.category')">
    <x-admin.ui.table
        :title="__('admin.navbar.category')"
        :create-text="__('admin.common.create')"
        create-url="admin.categories.create"
    >

        <table class="admin-table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin.category.title_hy') }}</th>
                <th>{{ __('admin.category.title_ru') }}</th>
                <th>{{ __('admin.category.title_en') }}</th>
                <th>{{ __('admin.category.brands') }}</th>
                <th>{{ __('admin.brands.table.status') }}</th>
                <th>{{ __('admin.common.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)

                <tr>
                    <td>
                        {{ $categories->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $category->name['hy'] }}
                    </td>

                    <td>
                        {{ $category->name['ru'] }}
                    </td>

                    <td>
                        {{ $category->name['en'] }}
                    </td>

                    <td>
                        {{ $category->brands->pluck('name')->join(', ') }}
                    </td>

                    <td>
                        @if($category->is_active)
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
                                href="{{ route('admin.categories.edit', [
                                        app()->getLocale(),
                                        $category
                                    ])
                                }}"
                                class="action-btn edit-btn"
                                title="{{ __('admin.common.edit') }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('admin.categories.changeStatus', [app()->getLocale(), $category]) }}"
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
        :paginator="$categories"
    />

</x-admin>
