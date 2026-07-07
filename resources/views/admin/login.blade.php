<x-admin title="Login">

    <section class="login-page">

        <div class="login-card">

            <div class="login-header">
                <img
                    src="{{ asset('assets/images/logo2.png') }}"
                    alt="Santech"
                    class="login-logo"
                >
            </div>

            <form action="{{ route('admin.login') }}" method="POST" class="form">
                @csrf

                <x-ui.input
                    label="Էլ․ Հասցե"
                    name="email"
                    type="email"
                    placeholder="admin@example.com"
                    autocomplete="email"
                />

                <x-ui.input
                    label="Գաղտնաբառ"
                    name="password"
                    type="password"
                    placeholder="********"
                    autocomplete="current-password"
                />

                <button type="submit" class="btn-primary w-100 h-60">
                    Մուտք
                </button>

            </form>

        </div>

    </section>

</x-admin>
