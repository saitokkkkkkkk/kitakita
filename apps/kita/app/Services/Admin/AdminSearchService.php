<?php

namespace App\Services\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminSearchService
{
    private const PAGINATION_COUNT = 10;

    /**
     * Get paginated admin users based on search criteria.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAdminUsers(Request $request)
    {
        // クエリビルダーのインスタンス作成
        $query = AdminUser::query();

        // 特殊文字をエスケープする関数
        $escapeLike = function ($value) {
            return '%'.str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $value).'%';
        };

        // 姓で部分一致（where句の追加）
        if ($request->filled('first_name')) {
            $query->where('first_name', 'like', $escapeLike($request->input('first_name')));
        }

        // 名で部分一致（where句の追加）
        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', $escapeLike($request->input('last_name')));
        }

        // メールアドレスで部分一致（where句の追加）
        if ($request->filled('email')) {
            $query->where('email', 'like', $escapeLike($request->input('email')));
        }

        // ここでクエリ発行
        return $query->orderBy('created_at', 'desc')
                     ->paginate(self::PAGINATION_COUNT)
                     ->appends($request->query());
    }
}
