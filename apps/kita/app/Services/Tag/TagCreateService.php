<?php

namespace App\Services\Tag;

use App\Http\Requests\StoreTagRequest;
use App\Models\ArticleTag;

class TagCreateService
{
    /**
     * Store a new tag in the database.
     *
     * @param  StoreTagRequest $request
     * @return \App\Models\ArticleTag
     */
    public function store(StoreTagRequest $request): ArticleTag
    {
        // バリデーション済みデータを保存
        return ArticleTag::create([
            'name' => $request->input('name'),
        ]);
    }
}
