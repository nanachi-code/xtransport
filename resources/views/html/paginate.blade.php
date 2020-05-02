@if ($paginator->hasPages())
<nav class="navigation-1 pagination" role="navigation">
    <div class="nav-links">
        @if ($paginator->onFirstPage())
        <a class="prev page-numbers control-pagination page-disabled" href="#">
            <i class="fa fa-angle-left"></i>
        </a>
        @else
        <a class="prev page-numbers control-pagination" href="{{ $paginator->previousPageUrl() }}">
            <i class="fa fa-angle-left"></i>
        </a>
        @endif
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="page-numbers current">{{ $page }}</span>
        @else
        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <a class="next page-numbers control-pagination" href="{{ $paginator->nextPageUrl() }}">
            <i class="fa fa-angle-right"></i>
        </a>
        @else
        <a class="next page-numbers control-pagination page-disabled" href="#">
            <i class="fa fa-angle-right"></i>
        </a>
        @endif
    </div>
</nav>
@endif
