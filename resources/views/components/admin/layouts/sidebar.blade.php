<aside class="admin-sidebar">

    <a href="{{ route('admin.dashboard.index') }}" class="sidebar-logo">

        <img
            src="{{ asset('assets/images/logo2.png') }}"
            alt="Santech"
        >

    </a>

    <button
        type="button"
        class="sidebar-close"
        id="sidebarClose"
    >
        <i class="fa-solid fa-xmark"></i>
    </button>

    <nav class="sidebar-nav">

        <a href="{{ route('admin.dashboard.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>{{ __('admin.navbar.dashboard') }}</span>
        </a>

        <a href="{{ route('admin.brands.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
            <i class="fa-solid fa-tags"></i>
            <span>{{ __('admin.navbar.brands') }}</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>{{ __('admin.navbar.category') }}</span>
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span>{{ __('admin.navbar.product') }}</span>
        </a>

        <a href="{{ route('admin.models.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.models.*') ? 'active' : '' }}">
            <i class="fa-solid fa-cubes"></i>
            <span>{{ __('admin.navbar.model') }}</span>
        </a>

        <a href="{{ route('admin.about.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <i class="fa-solid fa-building"></i>
            <span>{{ __('admin.navbar.about_us') }}</span>
        </a>

        <a href="{{ route('admin.statistics.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-column"></i>
            <span>{{ __('admin.navbar.company_statistics') }}</span>
        </a>

        <a href="{{ route('admin.contact.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.contact-us.*') ? 'active' : '' }}">
            <i class="fa-solid fa-address-card"></i>
            <span>{{ __('admin.navbar.contact_data') }}</span>
        </a>

    </nav>

    <div class="sidebar-footer">

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf

            <button class="sidebar-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>{{ __('admin.navbar.logout') }}</span>
            </button>

        </form>
    </div>

</aside>
