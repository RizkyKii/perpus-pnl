{{-- @if ($paginator->hasPages())
<ul class="pagination" role="navigation">

    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
    @endif

    <?php
        $start = $paginator->currentPage() - 2; 
        $end = $paginator->currentPage() + 2; 
        if($start < 1) {
            $start = 1; 
            $end += 1;
        } 
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); 
    ?>

    @if($start > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->url(1) }}">{{1}}</a>
        </li>
        @if($paginator->currentPage() != 4)

            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif
    @endif
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{$i}}</a>
            </li>
        @endfor
    @if($end < $paginator->lastPage())
        @if($paginator->currentPage() + 3 != $paginator->lastPage())

            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
        </li>
    @endif


    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">&rsaquo;</span>
        </li>
    @endif
</ul>
@endif --}}