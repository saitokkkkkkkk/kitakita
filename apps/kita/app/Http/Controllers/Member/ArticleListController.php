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
     * the number of articles displayed per page. If no search query is provided,
     * it will display all articles paginated.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance, which may contain
     *                                          the search query parameter.
     *
     * @return \Illuminate\View\View Returns a view displaying the paginated list of articles.
     */
    public const PAGINATION_COUNT = 10;

    public function index(Request $request)
    {
        $searchQuery = $request->input('search', '');

        $articles = Article::where('title', 'like', "%{$searchQuery}%")
            //記事一覧ブランチで言われた修正をこちらの検索ブランチで修正
            ->paginate(self::PAGINATION_COUNT)
            ->appends(['search' => $searchQuery]);

        $noArticles = $articles->isEmpty();

        return view('member.index', compact('articles', 'searchQuery', 'noArticles'));
    }
}
