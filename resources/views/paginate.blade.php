@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="row">
        <div class="col-md-12">
            <nav>
                <ul class="pager">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled" aria-disabled="true"><span>« Previous</span></li>
                    @else
                        <li><a class="no-underline" href="{{ $paginator->previousPageUrl() }}" rel="prev">« Previous</a></li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="pager-next"><a class="no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">Next »</a></li>
                    @else
                        <li class="disabled" aria-disabled="true"><span>Next »</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <!-- Pagination -->
@endif
