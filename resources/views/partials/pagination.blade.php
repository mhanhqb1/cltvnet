<ul class="pagination pagination-md m-0 float-right">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled"><span class="page-link" >&laquo;</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif

    {{-- Pagination Links --}}
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        @if ($page == $paginator->currentPage())
            <li class="page-item active"><span class="page-link" aria-current="page">{{ $page }}</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="page-item disabled"><span class="page-link" >&raquo;</span></li>
    @endif

</ul>
