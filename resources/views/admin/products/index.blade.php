<x-admin :title="__('admin.navbar.product')">
    <x-admin.ui.table
        :title="__('admin.navbar.product')"
        :create-text="__('admin.common.create')"
        create-url="admin.products.create"
    >

        <x-slot:search>
            <form id="filterForm" class="table-search" action="{{ route('admin.products.index') }}" method="GET">
                <div class="form-grid">
                    <x-ui.input
                        :label="__('admin.product.name')"
                        name="name"
                        :placeholder="__('admin.product.name')"
                        :value="request('name')"
                    />

                    <x-ui.select
                        id="brand-select"
                        :label="__('admin.product.brand')"
                        name="brand_id"
                        :options="$brands"
                        :multiple="false"
                        :selected="request('brand_id')"
                        :showAllOption="true"
                    />

                    <x-ui.select
                        id="category-select"
                        :label="__('admin.product.category')"
                        name="category_id"
                        :options="$categories"
                        :multiple="false"
                        :multilanguage="true"
                        :selected="request('category_id')"
                        :showAllOption="true"
                    />

                    <div class="form-group">
                        <button class="btn btn-primary h-50">
                            {{ __('admin.common.filter') }}
                        </button>
                    </div>
                </div>
            </form>
        </x-slot:search>


        <table class="admin-table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin.product.name') }}</th>
                <th>{{ __('admin.product.brand') }}</th>
                <th>{{ __('admin.product.category') }}</th>
                <th>{{ __('admin.common.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)

                <tr>

                    <td>
                        {{ $products->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $product->name }}
                    </td>

                    <td>
                        {{ $product->brand?->name }}
                    </td>

                    <td>
                        {{ $product->category?->name[app()->getLocale()] }}
                    </td>

                    <td>
                        @if($product->is_active)
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
                                href="{{ route('admin.products.edit', [
                                        app()->getLocale(),
                                        $product
                                    ])
                                }}"
                                class="action-btn edit-btn"
                                title="{{ __('admin.common.edit') }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('admin.products.changeStatus', [app()->getLocale(), $product]) }}"
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
        :paginator="$products"
    />

</x-admin>
