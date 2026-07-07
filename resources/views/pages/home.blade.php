<x-app :title="__('navbar.home')">

    <section class="hero">

        <div class="container">

            <div class="hero-banner">

                <img
                    src="{{ asset('assets/images/about.jpg') }}"
                    alt="Santech">

                <div class="hero-overlay"></div>

                <div class="hero-content">

                    <span class="hero-badge">
                        {{ __('content.hero_badge') }}
                    </span>

                    <h1>
                        SanTech
                    </h1>

                    <div class="hero-actions">

                        <a href="{{ route('contact.index') }}" class="btn-primary h-60">
                            {{ __('content.contact') }}
                        </a>

                        <a href="{{ route('inventory.index') }}" class="btn-secondary h-60">
                            {{ __('content.catalog') }}
                        </a>

                    </div>

                    <div class="hero-socials">
                        <x-shared.socials />
                    </div>

                </div>

            </div>

        </div>

    </section>

    <x-shared.stats
        :data="$statistics"
    />

</x-app>
