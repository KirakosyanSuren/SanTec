<x-admin :title="__('admin.navbar.company_statistics')">
    <x-admin.ui.table
        :title="__('admin.navbar.company_statistics')"
        :create-text="__('admin.common.create')"
        create-url="admin.statistics.create"
    >

        <table class="admin-table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin.statistics.table.value') }}</th>
                <th>{{ __('admin.statistics.table.title_hy') }}</th>
                <th>{{ __('admin.statistics.table.title_ru') }}</th>
                <th>{{ __('admin.statistics.table.title_en') }}</th>
                <th>{{ __('admin.statistics.table.status') }}</th>
                <th>{{ __('admin.common.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($statistics as $key => $statistic)

                <tr>

                    <td>
                        {{ ++$key }}
                    </td>

                    <td>
                        {{ $statistic->value }}
                    </td>

                    <td>
                        {{ $statistic->title['hy'] }}
                    </td>

                    <td>
                        {{ $statistic->title['ru'] }}
                    </td>

                    <td>
                        {{ $statistic->title['en'] }}
                    </td>

                    <td>
                        @if($statistic->is_active)
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
                                href="{{ route('admin.statistics.edit', [
                                        app()->getLocale(),
                                        $statistic
                                    ])
                                }}"
                                class="action-btn edit-btn"
                                title="{{ __('admin.common.edit') }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('admin.statistics.changeStatus', [app()->getLocale(), $statistic]) }}"
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

                            <form
                                action="{{ route('admin.statistics.destroy', [app()->getLocale(), $statistic]) }}"
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

{{--    <x-ui.pagination--}}
{{--        :paginator="$brands"--}}
{{--    />--}}

</x-admin>
