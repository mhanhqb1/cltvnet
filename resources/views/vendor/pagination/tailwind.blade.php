@if ($paginator->hasPages())
<div class="pagination-area">
    @if ($paginator->onFirstPage())
    <a href="javascript:void(0)" class="prev page-numbers">
        <i class="bx bx-left-arrow-alt"></i>
    </a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">
        <i class="bx bx-left-arrow-alt"></i>
    </a>
    @endif
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span class="page-numbers">{{ $element }}</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="page-numbers current" aria-current="page">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">
        <i class="bx bx-right-arrow-alt"></i>
    </a>
    @else
    <a href="javascript:void(0)" class="next page-numbers">
        <i class="bx bx-right-arrow-alt"></i>
    </a>
    @endif
</div>
@endif
