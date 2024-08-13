<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleUpdateService
{
    /**
     * Update the article's data.
     *
     * @param Article $article
     * @param array $data
     * @return \App\Models\Article
     */
    public function update(Article $article, array $data)
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
}
