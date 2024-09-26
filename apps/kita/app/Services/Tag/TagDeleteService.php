<?php

namespace App\Services\Tag;

use App\Models\ArticleTag;

class TagDeleteService
{
    /**
     * Service for deleting the tag.
     *
     * @param ArticleTag $articleTag
     * @return void
     */
    public function destroy(ArticleTag $articleTag)
    {
        //タグを物理削除
        $articleTag->delete();
    }
}
