<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleListController extends Controller
{
    public function index()
    {
        //環境変数からページネーション件数を取得
        $paginationCount = env('PAGINATION_COUNT', 10);
        $articles = Article::paginate($paginationCount);
        return view('member.index', compact('articles'));
    }
}
