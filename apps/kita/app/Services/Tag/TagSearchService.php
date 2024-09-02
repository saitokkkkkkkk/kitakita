<?php

namespace App\Services\Tag;

use App\Models\ArticleTag;
use App\Services\Helpers\StringHelper;

class TagSearchService
{
    //private const PAGINATION_COUNT = 10;

    public function getTags($tag)
    {
        //エスケープ
        $escapedTag = StringHelper::escapeLike($tag);

        //エスケープ後のパラメータでデータ取得
        return ArticleTag::where('name', 'LIKE', $escapedTag)->get();
    }
}
