@props([
    'email' => null
])

<a href="mailto:{{ $email }}">
    {{ $email }}
</a>
