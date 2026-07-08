<x-admin :title="__('admin.navbar.model')">
    <x-admin.ui.table
        :title="__('admin.navbar.model')"
        :create-text="__('admin.common.create')"
        create-url="admin.models.create"
    >
        <table class="admin-table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin.model.name') }}</th>
                <th>{{ __('admin.model.product') }}</th>
                <th>{{ __('admin.model.price') }}</th>
                <th>{{ __('admin.model.characteristic_hy') }}</th>
                <th>{{ __('admin.model.characteristic_ru') }}</th>
                <th>{{ __('admin.model.characteristic_en') }}</th>
                <th>{{ __('admin.common.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($models as $model)

                <tr>

                    <td>
                        {{ $models->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $model->name }}
                    </td>

                    <td>
                        {{ $model->product?->name }}
                    </td>

                    <td>
                        {{ number_format($model->price,0,' ',' ') }}
                    </td>

                    <td>
                        {{ $model->characteristic['hy'] }}
                    </td>

                    <td>
                        {{ $model->characteristic['ru'] }}
                    </td>

                    <td>
                        {{ $model->characteristic['en'] }}
                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('admin.models.edit', [
                                        app()->getLocale(),
                                        $model
                                    ])
                                }}"
                                class="action-btn edit-btn"
                                title="{{ __('admin.common.edit') }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('admin.models.destroy', [app()->getLocale(), $model]) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="action-btn delete-btn"
                                    onclick="return confirm('{{ __('admin.confirmations.delete') }}')"
                                >
                                    <i class="fa-solid fa-trash"></i>
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
        :paginator="$models"
    />

</x-admin>
