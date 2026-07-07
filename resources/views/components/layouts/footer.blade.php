    <footer class="footer">

        <div class="container">

            <div class="footer-content">

                <div class="footer-about">

                    <x-ui.logo class="footer-logo" />

                    <p>
                        {{ __('footer.description') }}
                    </p>

                </div>

                <div class="footer-nav">

                    <h3>{{ __('footer.navigation') }}</h3>

                    <ul>
                        <li>
                            <a href={{ route('home.index') }}>
                                {{ __('navbar.home') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('inventory.index') }}">
                                {{ __('navbar.inventory') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('brand.index') }}">
                                {{ __('navbar.brands') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about.index') }}">
                                {{ __('navbar.about') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact.index') }}">
                                {{ __('navbar.contact') }}
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="footer-contacts">

                    <h3>{{ __('footer.contacts') }}</h3>

                    <ul>

                        <li>
                            <x-ui.tel
                                :tel="$contact->phone"
                            />
                        </li>

                        <li>
                            <x-ui.email
                                :email="$contact->email"
                            />
                        </li>

                        <li>
                            {{ $contact->address[app()->getLocale()] }}
                        </li>

                    </ul>

                    <div class="footer-social">
                        <x-shared.socials />
                    </div>

                </div>

            </div>

            <div class="footer-bottom">

                <p>
                    © {{ date('Y') }} Santech.
                    {{ __('footer.copyright') }}
                </p>

            </div>

        </div>

    </footer>
