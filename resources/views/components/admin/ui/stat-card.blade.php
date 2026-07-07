@props([
    'title',
    'value',
    'icon',
    'variant' => 'blue'
])

<div {{ $attributes->merge(['class' => 'stat-card']) }}>

    <div class="stat-icon {{ $variant }}">
        <i class="{{ $icon }}"></i>
    </div>

    <div class="stat-content">
        <span>{{ $title }}</span>
        <h3>{{ $value }}</h3>
    </div>

</div>
