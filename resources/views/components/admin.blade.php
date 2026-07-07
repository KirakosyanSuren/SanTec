@props([
    'title' => 'SanTech'
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />

    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

</head>
<body>
<div class="admin-layout">

    @auth
        <x-admin.layouts.sidebar/>
    @endauth

    <main
        class="admin-content @auth with-sidebar @endauth"
    >

        @auth
            <x-admin.layouts.topbar />
        @endauth

        {{ $slot }}
    </main>

    <x-ui.alert />
</div>

<script>
    const locale = "{{ app()->getLocale() }}";
</script>

</body>
</html>
