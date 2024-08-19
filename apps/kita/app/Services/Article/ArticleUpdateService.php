<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleUpdateService
{
    /**
     * Check if the authenticated user has permission.
     *
     * @param Article $article
     * @return bool
     */
    public function hasEditPermission(Article $article): bool
    {
        // 権限の確認
        $userId = Auth::id();

        return $userId === $article->member_id;
    }

    /**
     * Update the article.
     *
     * @param Article $article
     * @param $data
     * @return bool
     */
    public function update(Article $article, $data): bool
    {

        // 編集権限がない時はfalse返却
        if (! $this->hasEditPermission($article))
        {
            return false;
        }

        // 編集権限ある時は更新してtrue返却
        DB::transaction(function () use ($article, $data) {

            // 記事テーブルの更新
            $article->update([
                'title' => $data['title'],
                'contents' => $data['contents'],
            ]);

            // 中間テーブルの更新
            $article->tags()->sync($data['tags']);

        });

        return true;
    }
}
