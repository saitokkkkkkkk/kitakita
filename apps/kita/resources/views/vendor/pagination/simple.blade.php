@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination pagination-sm">
            {{-- 前ページのリンク --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link text-success border-success text-nowrap">{!! __('Previous') !!}</a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link text-success border-success hover:text-success">{!! __('Previous') !!}</a>
                </li>
            @endif

            {{-- ページネーションの数字部分を取得 --}}
            @php
                $pageRange = 1;
                $start = max($paginator->currentPage() - $pageRange, 1);
                $end = min($paginator->currentPage() + $pageRange, $paginator->lastPage());

                if ($paginator->currentPage() <= $pageRange + 1) {
                    $end = min($pageRange * 2 + 1, $paginator->lastPage());
                }

                if ($paginator->currentPage() >= $paginator->lastPage() - $pageRange) {
                    $start = max($paginator->lastPage() - $pageRange * 2, 1);
                }
            @endphp

            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page">
                        <a class="page-link bg-success border-success text-white">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->url($page) }}" class="page-link text-success border-success hover:text-success">{{ $page }}</a>
                    </li>
                @endif
            @endfor

            {{-- 次ページのリンク --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link text-success border-success hover:text-success">{!! __('Next') !!}</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link text-success border-success text-nowrap">{!! __('Next') !!}</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
