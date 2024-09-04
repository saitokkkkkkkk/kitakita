<?php

namespace App\Services\Tag;

use App\Models\ArticleTag;
use App\Services\Helpers\StringHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TagSearchService
{
    private const PAGINATION_COUNT = 10;

    /**
     * Get the tags with pagination.
     *
     * @param string|null $tag
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTags($tag = null): LengthAwarePaginator
    {
        // 基本のクエリを生成
        $query = ArticleTag::query();

        // フォームが入力されていたら、エスケープ処理+検索条件を追加
        if (! empty($tag)) {
            $escapedTag = StringHelper::escapeLike($tag);
            $query->where('name', 'LIKE', $escapedTag);
        }

        // 実行（空文字検索では全件をreturn）
        return $query->paginate(self::PAGINATION_COUNT)
                     ->appends(['name' => $tag]);
    }
}
