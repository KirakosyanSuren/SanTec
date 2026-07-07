<x-admin :title="__('admin.navbar.dashboard')">

    <div class="dashboard">

        <div class="dashboard-header">
            <h1>{{ __('admin.navbar.dashboard') }}</h1>
        </div>

        <div class="stats-grid">

            <x-admin.ui.stat-card
                :title="__('admin.navbar.brands')"
                :value="$brandsCount"
                icon="fa-solid fa-box"
            />

            <x-admin.ui.stat-card
                :title="__('admin.navbar.category')"
                :value="$categoriesCount"
                icon="fa-solid fa-tags"
                variant="yellow"
            />

            <x-admin.ui.stat-card
                :title="__('admin.navbar.product')"
                :value="$productsCount"
                icon="fa-solid fa-mobile-screen"
            />

        </div>

        <x-admin.ui.table
            :title="__('admin.navbar.feedback')"
        >

            <table class="admin-table">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('admin.feedback.name') }}</th>
                    <th>{{ __('admin.feedback.email') }}</th>
                    <th>{{ __('admin.feedback.message') }}</th>
                    <th>{{ __('admin.brands.table.status') }}</th>
                    <th>{{ __('admin.common.actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedbacks->firstItem() + $loop->index }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>
                            @if($feedback->is_active)
                                <span class="status-badge active">
                                    {{ __('admin.common.completed') }}
                                </span>
                            @else
                                <span class="status-badge pending">
                                    {{ __('admin.common.pending') }}
                                </span>
                            @endif
                        </td>
                        <td>

                            <div class="table-actions">
                                <form
                                    action="{{ route('admin.feedback.changeStatus', [app()->getLocale(), $feedback]) }}"
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

                                @if($feedback->is_active)
                                    <form
                                        action="{{ route('admin.feedback.destroy', [app()->getLocale(), $feedback]) }}"
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
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </x-admin.ui.table>
    </div>

</x-admin>
