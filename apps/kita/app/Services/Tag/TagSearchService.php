<?php

namespace App\Services\Tag;

use App\Models\ArticleTag;
use App\Services\Helpers\StringHelper;

class TagSearchService
{
    private const PAGINATION_COUNT = 10;

    /**
     * Get the tags with pagination.
     *
     * @param string|null $tag
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTags($tag = null) // 空文字で検索した時にはnullが入る
    {
        // フォームが入力されてたら、
        if (! empty($tag)) {
            // エスケープ処理
            $escapedTag = StringHelper::escapeLike($tag);

            // エスケープ後のパラメータでlike検索
            return ArticleTag::where('name', 'LIKE', $escapedTag)
                ->paginate(self::PAGINATION_COUNT)
                ->appends(['name' => $tag]);
        }

        // フォームが入力されていない場合は全件を取得
        return ArticleTag::paginate(self::PAGINATION_COUNT);
    }
}
