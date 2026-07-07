@props([
    'paginator'
])

@if($paginator->hasPages())

    @php

        $current = $paginator->currentPage();
        $last = $paginator->lastPage();

        $start = max($current - 2, 1);
        $end = min($current + 2, $last);

    @endphp

    <div class="pagination-wrapper">

        <nav class="santech-pagination">

            {{-- Previous --}}
            @if($paginator->onFirstPage())

                <span class="pagination-btn disabled">
                    <
                </span>

            @else

                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="pagination-btn"
                >
                    <
                </a>

            @endif

            {{-- First Page --}}
            @if($start > 1)

                <a
                    href="{{ $paginator->url(1) }}"
                    class="pagination-btn"
                >
                    1
                </a>

                @if($start > 2)

                    <span class="pagination-dots">
                        ...
                    </span>

                @endif

            @endif

            {{-- Middle Pages --}}
            @for($page = $start; $page <= $end; $page++)

                @if($page === $current)

                    <span class="pagination-btn active">
                        {{ $page }}
                    </span>

                @else

                    <a
                        href="{{ $paginator->url($page) }}"
                        class="pagination-btn"
                    >
                        {{ $page }}
                    </a>

                @endif

            @endfor

            {{-- Last Page --}}
            @if($end < $last)

                @if($end < $last - 1)

                    <span class="pagination-dots">
                        ...
                    </span>

                @endif

                <a
                    href="{{ $paginator->url($last) }}"
                    class="pagination-btn"
                >
                    {{ $last }}
                </a>

            @endif

            {{-- Next --}}
            @if($paginator->hasMorePages())

                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="pagination-btn"
                >
                    >
                </a>

            @else

                <span class="pagination-btn disabled">
                    >
                </span>

            @endif

        </nav>

    </div>

@endif
