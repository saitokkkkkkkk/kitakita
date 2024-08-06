<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * Number of articles to show per page.
     *
     * @var int
     */
    public const PAGINATION_COUNT = 10;

    /**
     * Display a listing of the articles with pagination.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 検索ワード取得
        $searchQuery = $request->input('search', '');

        // 現在のページ番号をクエリから取得し、整数にキャスト
        $currentPage = intval($request->query('page', '1'));

        // 最大ページ番号を取得
        $totalCount = Article::count();
        $maxPage = ceil($totalCount / self::PAGINATION_COUNT);

        // クエリが最大ページ番号を超えている場合は404エラー
        if ($currentPage > $maxPage) {
            abort(404);
        }

        // タイトルと内容について部分一致検索
        $articles = Article::where(function ($query) use ($searchQuery) {
            $query->where('title', 'like', "%{$searchQuery}%")
                ->orWhere('contents', 'like', "%{$searchQuery}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)
            ->appends(['search' => $searchQuery]);

        return view('article.index', compact('articles', 'searchQuery'));

    }
}
