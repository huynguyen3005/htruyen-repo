@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <a href="#" class="page-link arrow" aria-label="Previous">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link arrow" aria-label="Previous">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="text-white">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item">
                                <a href="#" class="fs-6 page-link current">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="fs-6 page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link arrow" aria-label="Previous">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <a href="#" class="page-link arrow" aria-label="Previous">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
