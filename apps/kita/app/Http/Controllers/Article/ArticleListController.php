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
        // 作成日時が新しい順にソートし、ページネーション
        $articles = Article::orderBy('created_at', 'desc')->paginate(self::PAGINATION_COUNT);

        return view('article.index', compact('articles'));
    }
}
