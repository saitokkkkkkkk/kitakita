<?php

namespace App\Services\Tag;

use App\Http\Requests\StoreTagRequest;
use App\Models\ArticleTag;

class TagUpdateService
{
    /**
     * Update the specified tag with validated request data.
     *
     * @param StoreTagRequest $request
     * @param ArticleTag $articleTag
     * @return ArticleTag
     */
    public function update(StoreTagRequest $request, ArticleTag $articleTag)
    {
        $articleTag->update($request->validated());

        return $articleTag;
    }
}
