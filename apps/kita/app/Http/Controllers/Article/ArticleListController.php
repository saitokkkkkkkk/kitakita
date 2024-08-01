<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleListController extends Controller
{
    /**
     * Number of articles to show per page.
     */
    public const PAGINATION_COUNT = 10;

    /**
     * Display a listing of the articles with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 作成日時が新しい順にソートし、ページネーション
        $articles = Article::orderBy('created_at', 'desc')->paginate(self::PAGINATION_COUNT);

        return view('article.index', compact('articles'));
    }
}
