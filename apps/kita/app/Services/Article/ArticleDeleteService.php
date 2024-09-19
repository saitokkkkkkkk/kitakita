<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleDeleteService
{
    /**
     * Delete an article if the user has permission.
     *
     * @param Article $article
     * @return bool
     */
    public function deleteArticle(Article $article): bool
    {
        // ログイン中のユーザのユーザIDを取得
        // 認証済みであることはミドルウェアによって確認済み（多分そゆこと）
        $userId = Auth::id();

        // 本人の記事かどうかを確認
        if ($userId && $userId === $article->member_id) {
            // 論理削除
            $article->delete();

            return true;
        }

        // 本人の記事ではない時
        return false;
    }
}
