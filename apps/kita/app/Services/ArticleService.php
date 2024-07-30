<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

//記事更新でも多分使う
class ArticleService
{
    /**
     * Store a newly created article in the database.
     *
     * @param array $data The data to store the article, including 'title', 'contents', and 'tags'.
     * @return void
     *
     * @throws \Throwable If an error occurs during the transaction.
     */
    public function storeArticle($data)
    {
        DB::transaction(function () use ($data) {
            $article = Article::create([
                'title' => $data['title'],
                'contents' => $data['contents'],
                'member_id' => auth()->id(),
            ]);

        // タグはattach()
        $article->tags()->attach($data['tags']);
        });
    }
}
