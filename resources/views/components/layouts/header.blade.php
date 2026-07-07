<header class="header">

    <div class="header-container">

        <x-ui.logo class="logo" />

        <nav class="desktop-nav">
            <x-ui.navbar />
        </nav>

        <div class="header-actions">

            <div class="language-switcher">

                <button class="language-btn">
                    @if(app()->getLocale() == 'hy')
                        Հայ
                    @elseif(app()->getLocale() == 'ru')
                        Рус
                    @elseif(app()->getLocale() == 'en')
                        Eng
                    @endif

                    <svg width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M7 10l5 5 5-5z"/>
                    </svg>

                </button>

                <div class="language-dropdown">

                    <a
                        href="{{ localized_route('hy') }}"
                    >
                        Հայ
                    </a>

                    <a
                        href="{{ localized_route('ru') }}"
                    >
                        Рус
                    </a>
                    <a
                        href="{{ localized_route('en') }}"
                    >
                        Eng
                    </a>

                </div>

            </div>

            <button class="burger" id="burger">

                <span></span>
                <span></span>
                <span></span>

            </button>

        </div>

    </div>

</header>

<div class="mobile-overlay" id="overlay"></div>

<aside class="mobile-menu" id="mobileMenu">

    <div class="mobile-header">

{{--        <img src="{{ asset('assets/images/logo2.png') }}"--}}
{{--             alt="Santech">--}}

        <button class="close-btn" id="closeMenu">
            ✕
        </button>

    </div>

    <div class="mobile-language">

        <a
            href="{{ localized_route('hy') }}"
            class="{{ app()->getLocale() == 'hy' ? 'active' : '' }}"
        >
            Հայ
        </a>

        <a
            href="{{ localized_route('ru') }}"
            class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}"
        >
            Рус
        </a>
        <a
            href="{{ localized_route('en') }}"
            class="{{ app()->getLocale() == 'en' ? 'active' : '' }}"
        >
            Eng
        </a>

    </div>

    <nav class="mobile-nav">

        <x-ui.navbar />

    </nav>

    <div class="mobile-contact">

        <small>Телефон</small>

        <x-ui.tel />

    </div>

</aside>
