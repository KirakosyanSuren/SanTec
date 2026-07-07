@props([
    'title' => 'SanTech',
])

    <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>SanTech | {{ $title }}</title>

    <meta
        name="description"
        content="SanTech — Leading supplier of HVAC, heating, ventilation, plumbing and engineering systems in Armenia.">

    <meta
        name="robots"
        content="index,follow">

    <link
        rel="canonical"
        href="{{ url()->current() }}">

    {{-- Hreflang --}}
    <link rel="alternate" hreflang="hy" href="{{ localized_route('hy') }}">
    <link rel="alternate" hreflang="ru" href="{{ localized_route('ru') }}">
    <link rel="alternate" hreflang="en" href="{{ localized_route('en') }}">
    <link rel="alternate" hreflang="x-default" href="{{ localized_route('hy') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">

    <meta property="og:site_name" content="SanTech">

    <meta
        property="og:title"
        content="SanTech | {{ $title }}">

    <meta
        property="og:description"
        content="SanTech — Leading supplier of HVAC, heating, ventilation, plumbing and engineering systems in Armenia.">

    <meta
        property="og:url"
        content="{{ url()->current() }}">

    <meta
        property="og:image"
        content="{{ asset('assets/images/og.jpg') }}">

    {{-- Twitter --}}
    <meta
        name="twitter:card"
        content="summary_large_image">

    <meta
        name="twitter:title"
        content="SanTech | {{ $title }}">

    <meta
        name="twitter:description"
        content="SanTech — Leading supplier of HVAC, heating, ventilation, plumbing and engineering systems in Armenia.">

    <meta
        name="twitter:image"
        content="{{ asset('assets/images/logo2.png') }}">

    <link
        rel="icon"
        href="{{ asset('assets/images/favicon.png') }}">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

<x-layouts.header/>

<main class="container">

    {{ $slot }}

    <x-ui.alert/>

</main>

<x-layouts.footer/>

<script>
    const locale = "{{ app()->getLocale() }}";
</script>

</body>
</html>
