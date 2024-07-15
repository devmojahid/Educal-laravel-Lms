@if ($paginator->hasPages())
    <ul class="justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a aria-hidden="true">
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>
        @else
            <li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-hidden="true">
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li> <span class="current">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-hidden="true">
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <a class="next page-numbers" aria-hidden="true">
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
@endif
