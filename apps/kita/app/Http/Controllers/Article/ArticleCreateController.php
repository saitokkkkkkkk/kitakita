<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\ArticleTag;
use App\Services\Article\ArticleCreateService;

class ArticleCreateController extends Controller
{
    /**
     * The service instance
     *
     * @var \app\Services\Article\ArticleCreateService
     */
    protected $articleCreateService;

    /**
     * Create a new controller instance.
     *
     * @param \app\Services\Article\ArticleCreateService $articleCreateService
     * @return void
     */
    public function __construct(ArticleCreateService $articleCreateService)
    {
        $this->articleCreateService = $articleCreateService;
    }

    /**
     * Display the form for creating a new article.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $tags = ArticleTag::orderBy('name', 'asc')->get();

        return view('article.form', compact('tags'));
    }

    /**
     * Store a newly created article in the database.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        //バリデーション済みデータを引数としてサービスのメソッド呼ぶ
        $article = $this->articleCreateService->create($request->all());

        //リダイレクト
        return redirect()->route('articles.edit', ['article' => $article->id])
            //リダイレクト先（編集画面）で利用するからセッションで保持
            ->with([
                'success' => '<p class="fw-bold fs-3 mb-0">Success!</p>記事投稿が完了しました',
            ]);
    }
}
