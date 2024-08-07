<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\ArticleTag;
use App\Services\ArticleService;

class ArticleCreateController extends Controller
{
    /**
     * The service instance
     *
     * @var \App\Services\ArticleService
     */
    protected $articleService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\ArticleService $articleService
     * @return void
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
        $article = $this->articleService->storeArticle($request->all());

        //リダイレクト
        return redirect()->route('articles.edit', ['article' => $article->id])
            //セッションにサクセスメッセージと入力内容を保持（後で画面で直接使用）
            ->with('success', '<strong>Success!</strong><br>記事投稿が完了しました')
            ->with('article_data', [
                'title' => $article->title,
                'contents' => $article->contents,
                'tags' => $article->tags->pluck('id')->toArray(),
            ]);
    }
}
