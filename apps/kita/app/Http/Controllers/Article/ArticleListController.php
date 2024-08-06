<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ArticleListController extends Controller
{
    /**
     * Number of articles to show per page.
     *
     * @var int
     */
    public const PAGINATION_COUNT = 10;

    /**
     * Display a listing of the articles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        // 検索ワード取得
        $searchQuery = $request->input('search', '');

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
