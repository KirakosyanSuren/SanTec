@props([
    'title',
    'description' => null,
    'createText' => null,
    'createUrl' => null,
])

<div class="table-card">

    <div class="table-header">

        <div>
            <h2>{{ $title }}</h2>

            @if($description)
                <p>{{ $description }}</p>
            @endif
        </div>

        @if($createUrl)
            <a
                href="{{ route($createUrl) }}"
                class="btn-primary h-50"
            >
                <i class="fa-solid fa-plus"></i>
                {{ $createText }}
            </a>
        @endif


    </div>


    @if(isset($search))
        {{ $search }}
    @endif


    <div class="table-wrapper">
        {{ $slot }}
    </div>

</div>
