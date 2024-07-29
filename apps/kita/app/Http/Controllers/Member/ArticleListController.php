<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    public function index(Request $request)
    {
        //環境変数からページネーション件数を取得
        $paginationCount = env('PAGINATION_COUNT', 10);
        $query = Article::query();

        //検索パラメータがあればフィルタリング
        if ($request->has('search'))
        {
            $query->where('title', 'LIKE', '%'.$request->search.'%')
                ->orWhere('contents', 'LIKE', '%'.$request->search.'%');
        }

        $articles = $query->paginate($paginationCount);

        return view('member.index', compact('articles'));
    }
}
