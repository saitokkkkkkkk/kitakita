@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center custom-pagination">
        {{-- 前ページのリンク --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 cursor-default leading-5 mx-1">
                {!! __('Previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 mx-1">
                {!! __('Previous') !!}
            </a>
        @endif

        {{-- ページネーションの数字部分 --}}
        @php
            $start = max($paginator->currentPage() - 1, 1);
            $end = min($paginator->currentPage() + 1, $paginator->lastPage());
        @endphp

        {{-- 数字を描画 --}}
        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span class="relative inline-flex items-center text-sm font-medium text-white bg-green-600 border border-green-600 leading-5">{{ $page }}</span>
                </span>
            @else
                <a href="{{ $paginator->url($page) }}" class="relative inline-flex items-center text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {{ $page }}
                </a>
            @endif
        @endfor

        {{-- 次ページのリンク --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 mx-1">
                {!! __('Next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 cursor-default leading-5 mx-1">
                {!! __('Next') !!}
            </span>
        @endif
    </nav>
@endif

