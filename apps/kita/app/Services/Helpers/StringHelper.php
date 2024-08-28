<?php

namespace App\Services\Helpers;

class StringHelper
{
    /**
     * Escape special characters for use in SQL like queries.
     *
     * @param string $value
     * @return string
     */
    // タグ、会員検索でもおそらく使用
    public static function escapeLike(string $value): string
    {
        return '%'.str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $value).'%';
    }
}
