<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleSearchService;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * @var ArticleSearchService
     */
    protected $articleSearchService;

    /**
     * Create a new controller instance.
     *
     * @param ArticleSearchService $articleSearchService
     * @return void
     */
    // サービスの初期化
    public function __construct(ArticleSearchService $articleSearchService)
    {
        $this->articleSearchService = $articleSearchService;
    }

    /**
     * Display a listing of the articles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        // 検索ワード取得（デフォルトがなぜか空文字stringではなくnullとして動いていたため変更）
        $searchQuery = $request->input('search') ?? '';

        // 検索ワードをサービス層に渡してそこで記事取得
        $articles = $this->articleSearchService->searchArticles($searchQuery);

        return view('article.index', compact('articles'));
    }
}
