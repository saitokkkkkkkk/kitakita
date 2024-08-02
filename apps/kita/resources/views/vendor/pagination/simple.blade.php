@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center custom-pagination">
        {{-- 前ページのリンク --}}
        @if ($paginator->onFirstPage()) {{-- 現在が最初のページならリンク作成せずにspanでPrevious描画--}}
        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 cursor-default leading-5 mx-1">
                {!! __('Previous') !!}
            </span>
        @else {{-- 現在が最初のページではないならhrefでPreviousのリンク作成 --}}
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 mx-1">
            {!! __('Previous') !!}
        </a>
        @endif

        {{-- ページネーションの数字部分を取得 --}}
        @php
            // 現在のページの前後に表示するページ数
            $pageRange = 1;
            // 1未満にならないようにする
            $start = max($paginator->currentPage() - $pageRange, 1);
            // 最後のページを超えないようにする
            $end = min($paginator->currentPage() + $pageRange, $paginator->lastPage());

            // $pageRange=1の時、現在ページが1か2ならば、最終ページ（$end）の表示はどっちも3
            if ($paginator->currentPage() <= $pageRange + 1) {
                $end = min($pageRange * 2 + 1, $paginator->lastPage());
            }

            // 例)最大ページが4なら、現在ページが3か4の時、表示ページの最小（$start）はどっちも2
            if ($paginator->currentPage() >= $paginator->lastPage() - $pageRange) {
                $start = max($paginator->lastPage() - $pageRange * 2, 1);
            }
        @endphp

        {{-- 数字を描画 --}}
        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $paginator->currentPage()) {{-- 現在のページなら別のspanで描画 --}}
            <span aria-current="page">
                    <span class="relative inline-flex items-center text-sm font-medium text-white bg-green-600 border border-green-600 leading-5">{{ $page }}</span>
                </span>
            @else {{-- 現在のページ以外はhrefでリンクつける --}}
            <a href="{{ $paginator->url($page) }}" class="relative inline-flex items-center text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {{ $page }}
            </a>
            @endif
        @endfor

        {{-- 次ページのリンク --}}
        @if ($paginator->hasMorePages())
            {{-- 次ページが存在する時はhrefでNext --}}
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 leading-5 hover:text-green-500 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 mx-1">
                {!! __('Next') !!}
            </a>
        @else
            {{-- 次ページが存在しない時はspanでNext --}}
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-white border border-green-600 cursor-default leading-5 mx-1">
                {!! __('Next') !!}
            </span>
        @endif
    </nav>
@endif
