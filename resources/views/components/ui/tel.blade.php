@props([
    'tel' => null
])

<a href="tel:{{ $tel }}">
    {{ $tel }}
</a>
