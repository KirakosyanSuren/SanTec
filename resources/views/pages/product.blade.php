<x-app :title="__('navbar.inventory')">

    <section class="product-page">

        <div class="container">

            <div class="product-layout">

                <div class="product-gallery">

                    <div class="main-image-wrapper">

                        <img
                            src="{{ Storage::url($model->mainImage?->path) }}"
                            alt="{{ $product->name }}"
                            class="main-image"
                            id="mainImage">
                    </div>

                    <div class="gallery-thumbs">
                        @foreach($model->images as $image)

                            <img
                                src="{{ Storage::url($image->path) }}"
                                class="thumb {{ $image->is_main ? 'active-thumb' : '' }}"
                            >

                        @endforeach()
                    </div>

                </div>

                <div class="product-info">

                    <div class="product-tags">

                        <span class="product-brand">
                            {{ $product->brand->name }}
                        </span>

                        <span class="product-brand">
                            {{ $product->category->name[app()->getLocale()] }}
                        </span>

                    </div>

                    <h1>
                        {{ $product->name }}
                    </h1>

                    <div class="product-price">
                        {{ number_format($model->price,0,' ',' ') }} ֏
                    </div>

                    @if(isset($product->models) && $product->models->count())

                        <x-ui.select
                            id="model_select"
                            :label="__('content.choose_model')"
                            name="model"
                            :options="$product->models"
                            :multiple="false"
                            :selected="old('model', $model->id ?? null)"
                        />

                    @endif

                    @if(!empty($product->passport))

                        <div class="product-block">

                            <a
                                href="{{ asset('storage/'.$product->passport->path) }}"
                                target="_blank"
                                class="download-passport">

                                <svg width="22"
                                     height="22"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     viewBox="0 0 24 24">

                                    <path
                                        d="M12 16V4"/>

                                    <path
                                        d="M7 11l5 5 5-5"/>

                                    <path
                                        d="M20 20H4"/>

                                </svg>

                                <span>

                                    {{ __('content.download_passport') }}

                                </span>

                            </a>

                        </div>

                    @endif

                    <a
                        href="{{ route('contact.index') }}"
                        class="btn-primary w-100 h-60">

                        {{ __('content.contact') }}
                    </a>

                </div>

            </div>

        </div>

    </section>

    <section class="product-details">

        <div class="container">

            <div class="details-box">

                <h2>

                    {{ __('content.description_title') }}

                </h2>

                <p>
                    {{ $model->characteristic[app()->getLocale()] ?? '' }}
                </p>

            </div>

        </div>

    </section>

    @if(isset($relatedProducts) && $relatedProducts->count())

        <section class="related-products">

            <div class="container">

                <div class="section-header">

                    <span class="section-tag">

                        {{ __('content.related_tag') }}

                    </span>

                    <h2>
                        {{ __('content.related_title') }}
                    </h2>

                </div>

                <div class="product-grid">

                    @foreach($relatedProducts as $related)

                        <article class="product-card">

                            <img
                                src="{{ Storage::url($related->models->first()?->mainImage?->path) }}"
                                alt="{{ $related->name }}">

                            <div class="card-content">

                                <h3>
                                    {{ $related->name }}
                                </h3>

                                <span>
                                    {{ $related->brand->name }}
                                </span>

                                <span>
                                    {{ $related->category->name[app()->getLocale()] }}
                                </span>

                                <p class="product-desc">
                                    {{ $related->models->first()?->characteristic[app()->getLocale()] }}
                                </p>

                                <div class="product-bottom">
                                    @if($related->models->first()?->price)
                                        <div class="price">
                                            {{ number_format($related->models->first()?->price,0,' ',' ') }} ֏
                                        </div>
                                    @endif

                                    <a
                                        href="{{ route('inventory.show', [
                                                'locale' => app()->getLocale(),
                                                'name' => $related->models->first()?->name
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

        </section>

    @endif

</x-app>
