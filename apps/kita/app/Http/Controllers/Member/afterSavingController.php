<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTag;

class AfterSavingController extends Controller
{
    /**
     * Display the post-save confirmation page for either creating or editing an article.
     *
     * @param int|null $articleId
     * @return \Illuminate\View\View
     */
    public function show(int $articleId = null)
    {
        // 記事IDを$articleに入れる
        $article = $articleId ? Article::findOrFail($articleId) : null;

        // タグを全て取得
        $tags = ArticleTag::all();

        // セッションからsuccessメッセージを取得
        $successMessage = session('success');

        // 全部渡して画面を返す
        return view('member.after-saving', compact('article', 'tags', 'successMessage'));
    }
}
