<x-app :title="__('navbar.about')">

    <!-- COMPANY -->
    <section class="company">

        <div class="container">

            <h2 class="company-title">
                {{ $about->title[app()->getLocale()] }}
            </h2>

            <div class="company-image">
                <img
                    src="{{ asset('assets/images/hero.jpg') }}"
                    alt="Company">
            </div>

            <div class="company-content">
                {!! nl2br(e($about->description[app()->getLocale()])) !!}
            </div>

        </div>

    </section>

    <x-shared.stats :data="$statistics"/>

    <!-- CTA -->
    <section class="about-cta">

        <div class="container">

            <div class="cta-box">

                <h2>
                    {{ __('content.cta_title') }}
                </h2>

                <p>
                    {{ __('content.cta_description') }}
                </p>

                <a
                    href="{{ route('contact.index') }}"
                    class="btn-primary w-100 h-60">

                    {{ __('content.contact') }}

                </a>

            </div>

        </div>

    </section>

</x-app>
