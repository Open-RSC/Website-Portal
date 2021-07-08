<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="pagination justify-content-center">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center px-1 py-2 font-medium leading-5 rounded-md focus:outline-none" style="color:slategray;">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                            class="inline-flex items-center px-1 py-2 font-medium f leading-5 rounded-md hover:text-green-500 focus:outline-none transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                            class="inline-flex items-center px-1 py-2 font-medium f leading-5 rounded-md hover:text-green-500 focus:outline-none transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="inline-flex items-center px-1 py-2 font-medium leading-5 rounded-md focus:outline-none" style="color:slategray;">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
