<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    /**
     * Store a newly created article.
     *
     * @param array $data The data to store the article, including 'title', 'contents', and 'tags'.
     * @return \App\Models\Article The created article.
     */
    //分岐かなんかして記事更新でも多分使う
    public function storeArticle(array $data)
    {
        return DB::transaction(function () use ($data) {
            $article = Article::create([
                'title' => $data['title'],
                'contents' => $data['contents'],
                'member_id' => auth()->id(),
            ]);

            $article->tags()->attach($data['tags']);

            return $article;
        });
    }
}
