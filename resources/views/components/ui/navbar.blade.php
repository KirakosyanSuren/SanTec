<a
    href="{{ route('home.index') }}"
    class="{{ request()->routeIs('home.*') ? 'active' : '' }}"
>
    {{ __('navbar.home') }}
</a>

<a
    href="{{ route('inventory.index') }}"
    class="{{ request()->routeIs('inventory.*') ? 'active' : '' }}"
>
    {{ __('navbar.inventory') }}
</a>

<a
    href="{{ route('brand.index') }}"
    class="{{ request()->routeIs('brand.*') ? 'active' : '' }}"
>
    {{ __('navbar.brands') }}
</a>

<a
    href="{{ route('about.index') }}"
    class="{{ request()->routeIs('about.*') ? 'active' : '' }}"
>
    {{ __('navbar.about') }}
</a>

<a
    href="{{ route('contact.index') }}"
    class="{{ request()->routeIs('contact.*') ? 'active' : '' }}"
>
    {{ __('navbar.contact') }}
</a>
