@if ($paginator->hasPages())
    <ul class="pagination justify-content-center justify-content-sm-end">
        {{-- Previous Page Link --}} 
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link"><i class="ion-chevron-left"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-chevron-left"></i> </a></li>
            <!-- <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a> -->
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link" href="#"><span>{{ $element }}</span></a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item"><a class="page-link"  href="#"><span>{{ $page }}</span></a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="page-link"> <i class="fa fa-chevron-right"></i></a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#"><i class="ion-chevron-right"></i></a></li>
        @endif
    </ul>
@endif


