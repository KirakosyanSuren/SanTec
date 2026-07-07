<header class="admin-topbar glass">

    <div class="topbar-left">

        <button
            type="button"
            id="topbarToggle"
            class="sidebar-toggle"
        >
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>

    <div class="topbar-right">

        <div class="language-switcher">

            <button
                type="button"
                class="language-trigger"
            >
                <span>
                     @if(app()->getLocale() == 'hy')
                        Հայ
                    @elseif(app()->getLocale() == 'ru')
                        Рус
                    @elseif(app()->getLocale() == 'en')
                        Eng
                    @endif
                </span>
            </button>

            <div class="language-dropdown">

                <a href="{{ localized_route('hy') }}">
                    Հայ
                </a>

                <a href="{{ localized_route('ru') }}">
                    Рус
                </a>

                <a href="{{ localized_route('en') }}">
                    Eng
                </a>

            </div>

        </div>

    </div>

</header>
