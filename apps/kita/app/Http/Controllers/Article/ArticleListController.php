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
     * This method handles pagination of articles and redirects to the last page
     * if the requested page number exceeds the maximum available page number.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 現在のページ番号をクエリから取得し、整数にキャスト
        $currentPage = intval($request->query('page', '1'));

        // 最大ページ番号を取得
        $maxPage = Article::orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)->lastPage();

        // クエリが最大ページ番号を超えている場合は最大ページのとこにリダイレクト
        if ($currentPage > $maxPage) {
            return redirect()->route('articles.index', ['page' => $maxPage]);
        }

        // 作成日時が新しい順にソートし、ページネーション
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        return view('article.index', compact('articles'));
    }
}
