<x-app :title="__('navbar.contact')">

    <section class="contact-page">

        <div class="container">

            <div class="page-header">

                <h1>
                    {{ __('content.contact_title') }}
                </h1>

                <p>
                    {{ __('content.contact_subtitle') }}
                </p>

            </div>

            <div class="contact-grid">

                <div class="contact-info">

                    <div class="info-card">

                        <h3>
                            {{ __('content.phone') }}
                        </h3>

                        <x-ui.tel
                            :tel="$contact->phone"
                        />

                    </div>

                    <div class="info-card">

                        <h3>
                            {{ __('content.email') }}
                        </h3>

                        <x-ui.email
                            :email="$contact->email"
                        />

                    </div>

                    <div class="info-card">

                        <h3>
                            {{ __('content.address') }}
                        </h3>

                        <p>
                            {{ $contact->address[app()->getLocale()] }}
                        </p>

                    </div>

                    <div class="info-card">

                        <h3>
                            {{ __('content.socials') }}
                        </h3>

                        <div class="socials">

                            <x-shared.socials />

                        </div>

                    </div>

                </div>

                <div class="contact-form-wrapper">

                    <form class="contact-form" action="{{ route('feedback') }}" method="POST">
                        @csrf

                        <x-ui.input
                            :label="__('content.name')"
                            name="name"
                            :placeholder="__('content.name')"
                        />

                        <x-ui.input
                            :label="__('content.email')"
                            name="email"
                            :placeholder="__('content.email')"
                        />

                        <x-ui.textarea
                            :label="__('content.message')"
                            name="message"
                            :placeholder="__('content.message')"
                        />

                        <button type="submit" class="btn-primary w-100 h-60">

                            {{ __('content.send') }}

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <section class="contact-map">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.7784897401934!2d44.56320347581708!3d40.21979147147192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2fb3d33fc89%3A0xf7bddc17f3584998!2sSanTech!5e1!3m2!1sru!2sam!4v1781990514581!5m2!1sru!2sam"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">

        </iframe>

    </section>

</x-app>
