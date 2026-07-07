<x-app :title="__('navbar.brands')">

    <section class="brand-hero">
        <div class="container">

            <div class="brand-hero-content">

                <div class="brand-logo">
                    <img
                        src="{{ Storage::url($brand->image->path) }}"
                        alt="{{ $brand->name }}"
                    >
                </div>

                <div class="brand-info">

                    <h1>
                        {{ $brand->name }}
                    </h1>

                    <p>
                        {{ $brand->description[app()->getLocale()] }}
                    </p>

                </div>

            </div>

        </div>
    </section>

    @if($brand->certificates->count())
        <section class="certificates-section">

            <div class="container">

                <div class="section-header">

                    <h2>
                        {{ __('content.certificates') }}
                    </h2>

                    <p>
                        {{ __('content.certificates_description') }}
                    </p>

                </div>

                <div class="certificates-grid">

                    @foreach($brand->certificates as $certificate)

                        <div class="certificate-card">

                            <div class="certificate-icon">
                                <i class="fa-regular fa-file-pdf"></i>
                            </div>

                            <h3>
                                {{ $certificate->title }}
                            </h3>

                            <a
                                href="{{ Storage::url($certificate->path) }}"
                                target="_blank"
                                class="btn-primary"
                            >
                                {{ __('content.view_certificate') }}
                            </a>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>
    @endif

</x-app>
