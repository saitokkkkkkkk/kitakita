<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleCreateService
{
    /**
     * Store a newly created article.
     *
     * @param array $data The data to store the article, including 'title', 'contents', and 'tags'.
     * @return \App\Models\Article The created article.
     */

    //新規作成の保存
    public function create(array $data)
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
