@if ($paginator->hasPages())
    <nav class="shop-pagination m-auto border-0">
        <ul class="pagination d-flex justify-content-center border-0 fs-6 gap-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class=" border-0" aria-hidden="true"><i class="zmdi zmdi-long-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="border-0" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="zmdi zmdi-long-arrow-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled border-0" aria-disabled="true"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active border-0" aria-current="page"><span class="">{{ $page }}</span></li>
                        @else
                            <li class="page-item border-0"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class=" border-0" aria-hidden="true"><i class="zmdi zmdi-long-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
