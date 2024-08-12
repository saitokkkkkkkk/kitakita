<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTag;

class ArticleEditController extends Controller
{
    /**
     * Display the post-save and edit view.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    //
    public function show(Article $article)
    {
        // タグを全て取得
        $tags = ArticleTag::orderBy('name', 'asc')->get();

        // 全部渡して画面を返す
        return view('article.edit', compact('article', 'tags'));
    }
}
