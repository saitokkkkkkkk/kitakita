<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTag;

class AfterSavingController extends Controller
{
    /**
     * Display the post-save view.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    //ルートモデルバインディング使用＋画面でsession()として簡素化
    public function show(Article $article)
    {
        // タグを全て取得
        $tags = ArticleTag::all();

        // 全部渡して画面を返す
        return view('article.edit.index', compact('article', 'tags'));
    }
}
