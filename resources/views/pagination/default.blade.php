@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled"><span>صفحه قبل</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">صفحه قبل</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="uk-disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">صفحه بعد</a></li>
        @else
            <li class="uk-disabled"><span>صفحه بعد</span></li>
        @endif
    </ul>
@endif