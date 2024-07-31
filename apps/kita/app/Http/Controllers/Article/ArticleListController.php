<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleListController extends Controller
{
    // 定数を定義
    public const PAGINATION_COUNT = 10;

    public function index()
    {
        $articles = Article::paginate(self::PAGINATION_COUNT);

        return view('article.index', compact('articles'));
    }
}
