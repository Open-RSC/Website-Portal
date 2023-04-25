<div>
    @if ($paginator->hasPages())
        <div aria-label="Pagination Navigation" class="pagination justify-content-center">
            <div class="sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray;">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before" class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none transition ease-in-out duration-150" style="font-size:16px;">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none transition ease-in-out duration-150" style="font-size:16px;">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray;">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray;" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}" style="font-size:16px;">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray;">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray; font-size:16px;">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button wire:click="gotoPage({{ $page }})" class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" style="font-size:16px;">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}" style="font-size:16px;">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" style="color:slategray;" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </div>
    @endif
</div>
