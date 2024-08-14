<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleUpdateService
{
    /**
     * Check if the authenticated user has permission to edit the article.
     *
     * @param Article $article
     * @return bool
     */
    public function canViewEditScreen(Article $article): bool
    {
        //url直接打っても編集画面見れないように
        $userId = Auth::id();

        return $userId === $article->member_id;
    }

    /**
     * Update the article.
     *
     * @param Article $article
     * @param $data
     * @return mixed
     */
    public function update(Article $article, $data)
    {
        // ログイン中のユーザのユーザIDを取得
        $userId = Auth::id();

        // 編集権限がある時は更新
        if ($userId && $userId === $article->member_id)
        {
            return DB::transaction(function () use ($article, $data) {

                // 記事テーブルの更新
                $article->update([
                    'title' => $data['title'],
                    'contents' => $data['contents'],
                ]);

                // 中間テーブルの更新
                $article->tags()->sync($data['tags']);

                return $article;
            });
        }

        // 編集権限がない時
        return null;
    }
}
