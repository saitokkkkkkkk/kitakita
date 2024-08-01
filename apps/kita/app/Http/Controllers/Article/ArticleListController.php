<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * Number of articles to show per page.
     */
    public const PAGINATION_COUNT = 10;


    public function index(Request $request)
    {
        // 現在のページ番号をクエリから取得
        $currentPage = $request->query('page', 1);

        // 最大ページ番号を取得
        $maxPage = Article::orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)->lastPage();

        // 現在のページが最大ページ番号を超えている場合は最大ページのところにリダイレクト
        if ($currentPage > $maxPage) {
            return redirect()->route('articles.index', ['page' => $maxPage]);
        }

        // 作成日時が新しい順にソートし、ページネーション
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        return view('article.index', compact('articles'));
    }
}
