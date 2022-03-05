@if ($paginator->hasPages())
    <div aria-label="Pagination Navigation" class="pagination justify-content-center">
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div class="orsc-pagination-group">
                <?php
                $start = $paginator->currentPage() - 2; // show 3 pagination links before current
                $end = $paginator->currentPage() + 2; // show 3 pagination links after current
                if ($start < 1) {
                    $start = 1; // reset start to 1
                    $end += 1;
                }
                if ($end >= $paginator->lastPage()) $end = $paginator->lastPage(); // reset end to last page
                ?>

                @if($start > 1)
                    <li class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none hiscores-page-link">
                        <a class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none
                            orsc-pagination-link" href="{{ $paginator->url(1) }}">{{1}}</a>
                    </li>
                    @if($paginator->currentPage() != 4)
                        {{-- "Three Dots" Separator --}}
                        <li class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none" aria-disabled="true">
                            <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none">...</span>
                        </li>
                    @endif
                @endif
                @for ($i = $start; $i <= $end; $i++)
                    <li class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none page-item
                        hiscores-page-link {{($paginator->currentPage() == $i) ? 'active' : ''}}">
                        @if ($paginator->currentPage() == $i)
                            {{$i}}
                        @else
                            <a class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none
                                orsc-pagination-link" href="{{ $paginator->url($i) }}">{{$i}}</a>
                        @endif
                    </li>
                @endfor
                @if($end < $paginator->lastPage())
                    @if($paginator->currentPage() + 3 != $paginator->lastPage())
                        {{-- "Three Dots" Separator --}}
                        <li class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none disabled
                            hiscores-page-link" aria-disabled="true">
                                <span class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none">...</span>
                        </li>
                    @endif
                    <li class="inline-flex items-center px-1 py-2 leading-5 rounded-md focus:outline-none hiscores-page-link">
                        <a class="inline-flex items-center px-1 py-2 f leading-5 rounded-md hover:underline focus:outline-none"
                           href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
                    </li>
                @endif
            </div>
        </div>
    </div>
@endif
