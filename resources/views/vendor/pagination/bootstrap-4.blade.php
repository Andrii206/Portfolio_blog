<div class="row">
    <div class="col-12 pb-5 mb-5">
        <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="previous"><i class="bi bi-arrow-left-short"></i></a>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}" class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                    @endforeach
                @endif
            @endforeach
            
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next"><i class="bi bi-arrow-right-short"></i></a>
            @endif
        </nav>
    </div>
</div>
