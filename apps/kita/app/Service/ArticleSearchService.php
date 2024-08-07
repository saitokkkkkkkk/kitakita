<?php

namespace App\Service;

use App\Models\Article;

class ArticleSearchService
{
    /**
     * Number of articles per page.
     */
    public const PAGINATION_COUNT = 10;

    /**
     * Get paginated list of articles with search functionality.
     *
     * @param string $searchQuery
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchArticles(string $searchQuery)
    {
        // 特殊文字をエスケープする
        $searchPattern = '%'.str_replace(['\\', '%', '_'], ['\\\\\\', '\%', '\_'], $searchQuery).'%';

        // タイトルと内容について部分一致検索
        return Article::where(function ($query) use ($searchPattern) {
            $query->where('title', 'like', $searchPattern)
                ->orWhere('contents', 'like', $searchPattern);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)
            ->appends(['search' => $searchQuery]);
    }
}
