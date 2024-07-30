<?php

namespace App\Http\Controllers\Member;

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
     * Display the form for creating a new article providing a list of tags.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $tags = ArticleTag::all();

        return view('member.create', compact('tags'));
    }

    /**
     * Store a newly created article in the database.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        //バリデーション済みのデータもらう
        $validated = $request->validated();

        try {
            //サービスのメソッド呼ぶ
            $article = $this->articleService->storeArticle($validated);

            //リダイレクト
            return redirect()->route('articles.edit', ['article' => $article->id])
                ->with('success', '記事投稿が完了しました');
        } catch (\Exception $e) {

            //何かエラーがあったら表示
            return redirect()->back()
                ->withErrors(['error' => '記事作成中にエラーが発生しました'])
                ->withInput();
        }
    }
}
