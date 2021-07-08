@if ($paginator->hasPages())
    <div aria-label="Pagination Navigation" class="pagination justify-content-center">
        <div class="sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                      style="color:slategray; font-size:16px;">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                   style="font-size:16px;">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                   style="font-size:16px;">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                      style="color:slategray; font-size:16px;">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                                  style="color:slategray; font-size:16px;" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                           style="font-size:16px;" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                                      style="color:slategray; font-size:16px;">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            <?php $index = 0; ?>
                            @foreach ($element as $page => $url)
                                @if($index<4)
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page">
                                        <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                                              style="color:slategray; font-size:16px;">{{ $page }}</span>
                                    </span>
                                    @else
                                        <a href="{{ $url }}"
                                           class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                                           style="font-size:16px;"
                                           aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                    @endif
                                @endif
                                <?php $index++ ?>
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                           class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                           style="font-size:16px;" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none"
                                  style="color:slategray; font-size:16px;" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </div>
@endif
