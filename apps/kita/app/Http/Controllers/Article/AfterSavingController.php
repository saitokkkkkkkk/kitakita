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
     * @param int $articleId
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($articleId)
    {
        // 記事IDを$articleに入れる
        $article = Article::findOrFail($articleId);

        // タグを全て取得
        $tags = ArticleTag::all();

        // セッションからsuccessメッセージを取得
        $successMessage = session('success');

        // 全部渡して画面を返す
        return view('article.edit.index', compact('article', 'tags', 'successMessage'));
    }
}
