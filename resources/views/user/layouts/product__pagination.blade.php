

@if ($paginator->hasPages())
<div class="row">
    <div class="col-lg-12">
        <div class="product__pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            <a href="#" class="prev">&laquo</a>
            @else

            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
           
            <a class="active"  aria-disabled="true" href="#">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <a class="active" aria-current="page"><span>{{ $page }}</span></a>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
          
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
          
            @else

            
            <a href="#"  aria-label="@lang('pagination.next')" class="next">&raquo;</a>

            @endif
            </div>
    </div>
</div>
            @endif