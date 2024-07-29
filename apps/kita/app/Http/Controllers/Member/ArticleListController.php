<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * Display a paginated list of articles with optional search filtering.
     *
     * This method retrieves articles from the database, optionally filtering them
     * based on a search query provided in the request. It uses pagination to limit
     * the number of articles displayed per page.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance, which may contain
     *                                          the search query parameter.
     *
     * @return \Illuminate\View\View Returns a view displaying the paginated list of articles.
     *
     * @throws \Exception Throws an exception if there is an issue with querying the database.
     */
    public function index(Request $request)
    {
        $paginationCount = env('PAGINATION_COUNT', 10);
        $query = Article::query();

        if ($request->has('search'))
        {
            $query->where('title', 'LIKE', '%'.$request->search.'%')
                ->orWhere('contents', 'LIKE', '%'.$request->search.'%');
        }

        $articles = $query->paginate($paginationCount);
        $noArticles = $articles->isEmpty();

        return view('member.index', compact('articles', 'noArticles'));
    }
}
