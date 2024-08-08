<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ArticleDeleteController extends Controller
{
    /**
     * Handle the deletion of an article.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article)
    {
        //ログイン中のユーザのユーザid取得
        $userId = Auth::id();

        //記事の会員idとログイン中のユーザのidが一致するか確認
        if ($userId && $userId === $article->member_id) {
            //論理削除
            $article->delete();

            // セッションにメッセージを追加してリダイレクト
            return redirect()->route('articles.index')
                ->with('success', '<p class="fw-bold fs-3 mb-0">Success!</p>記事を削除しました');
        }

        //削除権限がないときは単にリダイレクト
        return redirect()->route('articles.index');
    }
}
