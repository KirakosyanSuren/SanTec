<x-app :title="__('navbar.brands')">

    <section class="brands-page">

        <div class="container">

            <div class="page-header">

                <h1>
                    {{ __('content.brand_title') }}
                </h1>

                <p>
                    {{ __('content.brand_subtitle') }}
                </p>

            </div>

            <div class="brands-grid">

                @foreach($brands as $brand)

                    <article class="brand-card">

                    <div class="brand-image">

                        <img
                            src="{{ Storage::url($brand?->image->path) }}"
                            alt="AerMec"
                        >

                    </div>

                    <div class="brand-content">

                        {{-- Из БД --}}
                        <h3>
                            {{ $brand->name }}
                        </h3>

                        {{-- Из БД --}}
                        <span class="products-count">
                            {{ $brand->products_count }} {{ __('content.products') }}
                        </span>

                        <div class="brand-actions">

                            <a
                                href="{{ route('brand.show', $brand->slug) }}"
                                class="btn-primary h-50"
                            >
                                {{ __('content.more_info') }}
                            </a>

                            <a
                                href="{{ route('inventory.index', [
                                    app()->getLocale(),
                                    'brand_id' => $brand->id,
                                ]) }}"
                                class="btn-primary h-50"
                            >
                                {{ __('content.view_products') }}
                            </a>

                        </div>
                    </div>

                </article>

                @endforeach

            </div>

            <x-ui.pagination
                :paginator="$brands"
            />

        </div>

    </section>

</x-app>
