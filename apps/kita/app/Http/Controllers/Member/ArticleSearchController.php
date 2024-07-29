<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleSearchController extends Controller
{
    /**
     * Display a listing of the articles based on search query.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $request->input('search'); // 'search' パラメータを取得
        $paginationCount = env('PAGINATION_COUNT', 10);

        if ($query) {
            $articles = Article::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('contents', 'LIKE', '%' . $query . '%')
                ->paginate($paginationCount);
        } else {
            $articles = Article::paginate($paginationCount);
        }

        return view('member.index', compact('articles', 'query')); // ビューのパスを適切に修正
    }
}
