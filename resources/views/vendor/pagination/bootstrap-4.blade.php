@if ($paginator->hasPages())
        <ul class="d-flex align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="prev disabled">
                    <a class="link-btn link-prev" aria-hidden="true"> 
                        {{ __('dashboard.prev')  }}
                        <i class="arrow_left"></i>
                        <i class="arrow_left"></i>
                    </a>
                </li>
            @else
                <li class="prev">
                    <a class="link-btn link-prev" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-hidden="true"> 
                        {{ __('dashboard.prev')  }}
                        <i class="arrow_left"></i>
                        <i class="arrow_left"></i>
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
                            <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next">
                    <a class="link-btn" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-hidden="true"> 
                        {{ __('dashboard.next')  }}
                        <i class="arrow_right"></i>
                        <i class="arrow_right"></i>
                    </a>
                </li>
            @else
                <li class="next disabled" aria-disabled="true" >
                    <a class="link-btn" aria-hidden="true"> 
                        {{ __('dashboard.next')  }}
                        <i class="arrow_right"></i>
                        <i class="arrow_right"></i>
                    </a>
                </li>

            @endif
        </ul>
@endif
