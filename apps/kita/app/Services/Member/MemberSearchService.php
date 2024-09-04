<?php

namespace App\Services\Member;

use App\Models\Member;
use App\Services\Helpers\StringHelper;
use Illuminate\Http\Request;

class MemberSearchService
{
    private const PAGINATION_COUNT = 10;

    /**
     * Execute the search query and return the paginated results.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(Request $request)
    {
        //クエリビルダのインスタンスを取得
        $query = Member::query();

        //検索条件を追加するメソッドを呼ぶ
        $this->applySearchCriteria($query, $request);

        //ここでクエリ実行
        return $query->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT)
            ->appends($request->query());
    }

    /**
     * Add search filter to the query.
     *
     * @param $query
     * @param Request $request
     * @return void
     */
    private function applySearchCriteria($query, Request $request)
    {
        // 検索条件の配列
        $searchCriteria = [
            'name' => 'name',
            'email' => 'email',
        ];

        // ループで検索条件を追加
        foreach ($searchCriteria as $inputName => $columnName) {
            if ($request->filled($inputName)) {
                $query->where($columnName, 'LIKE', StringHelper::escapeLike($request->input($inputName)));
            }
        }
    }
}
