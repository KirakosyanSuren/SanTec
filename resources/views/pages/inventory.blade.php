<x-app :title="__('navbar.inventory')">

    <section class="inventory-page">

        <div class="container">

            <div class="inventory-header">

                <h1>
                    {{ __('content.title') }}
                </h1>

                <p>
                    {{ __('content.subtitle') }}
                </p>

            </div>

            <div class="inventory-layout">

                <!-- FILTERS -->

                <aside class="filters">

                    <form id="filterForm" class="filter-card">

                        <h3>
                            {{ __('content.filters') }}
                        </h3>

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

                        <x-ui.input
                            :label="__('content.name')"
                            name="name"
                            :placeholder="__('content.search_placeholder')"
                            :value="request('name')"
                        />

                        <x-ui.input
                            :label="__('content.price_from')"
                            name="price_from"
                            placeholder="0"
                            :value="request('price_from')"
                        />

                        <x-ui.input
                            :label="__('content.price_to')"
                            name="price_to"
                            placeholder="100000"
                            :value="request('price_to')"
                        />

                        <button class="btn-primary w-100 h-50">
                            {{ __('content.apply') }}
                        </button>

                    </form>

                </aside>

                <!-- PRODUCTS -->

                <div class="products-grid">

                    @foreach($products as $product)

                        <article class="product-card">

                            <div class="product-image">

                                <img
                                    src="{{ Storage::url($product->models->first()?->mainImage?->path) }}"
                                    alt="Product">
                            </div>

                            <div class="product-content">

                                <h3>
                                    {{ $product->name }}
                                </h3>

                                <div class="product-brand">
                                    {{ $product->brand->name }}
                                </div>

                                <div class="product-brand">
                                    {{ $product->category->name[app()->getLocale()] }}
                                </div>

                                <p class="product-desc">
                                    {{ $product->models->first()?->characteristic[app()->getLocale()] }}
                                </p>

                                <div class="product-bottom">
                                    @if($product->models->first()?->price)
                                        <div class="price">
                                            {{ number_format($product->models->first()?->price,0,' ',' ') }} ֏
                                        </div>
                                    @endif

                                    <a
                                        href="{{ route('inventory.show', [
                                            'locale' => app()->getLocale(),
                                            'name' => $product->models->first()?->name
                                        ]) }}"
                                        class="btn-primary w-100 h-50"
                                    >

                                        {{ __('content.more') }}

                                    </a>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

            <x-ui.pagination
                :paginator="$products"
            />

        </div>

    </section>

</x-app>
