@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                  style="color:slategray; font-size:22px;">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
               class="inline-flex items-center px-1 py-2 font-medium f leading-5 rounded-md" style="font-size:22px;">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               class="inline-flex items-center px-1 py-2 font-medium f leading-5 rounded-md" style="font-size:22px;">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                  style="color:slategray; font-size:22px;">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
