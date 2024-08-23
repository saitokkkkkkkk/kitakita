<?php

namespace App\Services;

use App\Models\ArticleTag;

class TagService
{
    /**
     * Store the tag.
     *
     * @param array $data
     * @return ArticleTag
     */
    public function store(array $data): ArticleTag
    {
        // バリデーション済みデータを保存
        return ArticleTag::create([
            'name' => $data['name'],
        ]);
    }
}
