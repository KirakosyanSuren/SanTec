@props([
    'data'
])

<section class="stats">

    <div class="container">

        <div class="stats-grid">
            @foreach($data as $item)
                <div class="stat-card reveal">
                    <h2>{{ $item->value }}+</h2>
                    <p>{{ $item->title[app()->getLocale()] }}</p>
                </div>
            @endforeach
        </div>

    </div>

</section>
