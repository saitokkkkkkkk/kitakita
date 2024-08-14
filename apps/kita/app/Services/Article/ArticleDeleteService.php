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
        $userId = Auth::id();

        // 記事の会員IDとログイン中のユーザのIDが一致するか確認
        if ($userId && $userId === $article->member_id) {
            // 論理削除
            $article->delete();

            return true;
        }

        // 削除権限がない時
        return false;
    }
}
