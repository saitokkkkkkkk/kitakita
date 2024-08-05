<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\ArticleTag;
use App\Services\ArticleService;

class ArticleCreateController extends Controller
{
    protected $articleService;

    /**
     * ArticleCreateController constructor.
     *
     * @param \App\Services\ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display the form for creating a new article.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $tags = ArticleTag::all();

        return view('article.create', compact('tags'));
    }

    /**
     * Store a newly created article.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        //バリデーション済みのデータもらう
        $validated = $request->validated();

        //サービスのメソッド呼ぶ
        $article = $this->articleService->storeArticle($validated);

        //リダイレクト
        return redirect()->route('articles.edit', ['article' => $article->id])
            ->with('success', '<strong>Success!</strong><br>記事投稿が完了しました');

    }
}
