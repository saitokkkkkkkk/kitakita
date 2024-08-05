<?php

namespace app\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleDetailController extends Controller
{
    //記事詳細を表示
    public function show($id)
    {
        $article = Article::with('tags', 'member')->findOrFail($id);
        //ビューではなくてコントローラで処理
        $userId = auth()->id();
        $canEditOrDelete = $userId && $userId === $article->member_id;

        return view('article.details', compact('article', 'canEditOrDelete'));
    }
}
