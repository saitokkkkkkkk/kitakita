<?php

namespace App\Services\Admin;

use App\Models\AdminUser;
use App\Services\Helpers\StringHelper;
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
        // クエリビルダのインスタンスを作成（applySearchCriteria()で使う）
        $query = AdminUser::query();

        // 検索条件を追加するメソッドを呼ぶ
        $this->applySearchCriteria($query, $request);

        // ここでクエリの実行
        return $query->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)
            ->appends($request->query());
    }

    /**
     * Apply search filters to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param Request $request
     * @return void
     */
    private function applySearchCriteria($query, Request $request)
    {
        // フィールド名とカラム名を対応させてセット
        $searchCriteria = [
            'last_name' => 'last_name',
            'first_name' => 'first_name',
            'email' => 'email',
        ];

        // フィールドが埋まっていれば対応するカラムで部分一致検索。where句を追加していく
        foreach ($searchCriteria as $inputName => $columnName) {
            if ($request->filled($inputName)) {
                $query->where($columnName, 'like', StringHelper::escapeLike($request->input($inputName)));
            }
        }
    }
}
