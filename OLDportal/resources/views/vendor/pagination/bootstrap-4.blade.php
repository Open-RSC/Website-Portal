@if ($paginator->hasPages())
	<ul class="pagination text-primary justify-content-center">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<li class="page-item disabled">
				<a class="bg-dark border-info page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
		@else
		<!-- left button -->
			<li class="page-item">
				<a href="{{ $paginator->previousPageUrl() }}" class="bg-dark border-info text-primary page-link"
				   rel="prev">&laquo;</a>
			</li>
		@endif

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<li class="page-item disabled">{{ $element }}</li>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li class="page-item active">
							<!-- current page button -->
							<a href="#" class="bg-info border-info text-white page-link">{{ $page }}<span
									class="sr-only">(current)</span></a>
						</li>
					@else
						<li class="page-item">
							<!-- nearby pages buttons -->
							<a href="{{ $url }}" class="bg-dark border-info text-primary page-link">{{ $page }}</a>
						</li>
					@endif
				@endforeach
			@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
		<!-- right button -->
			<li class="page-item">
				<a href="{{ $paginator->nextPageUrl() }}" class="bg-dark border-info text-primary page-link" rel="next">&raquo;</a>
			</li>
		@else
			<li class="page-item disabled">
				<a class="bg-dark border-info page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		@endif
	</ul>
@endif
