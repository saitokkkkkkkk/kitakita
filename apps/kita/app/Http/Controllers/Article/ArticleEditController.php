<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Services\Article\ArticleUpdateService;

class ArticleEditController extends Controller
{
    /**
     * The service instance.
     *
     * @var ArticleUpdateService
     */
    protected $articleUpdateService;

    /**
     * Create a new controller instance.
     *
     * @param ArticleUpdateService $articleUpdateService
     */
    public function __construct(ArticleUpdateService $articleUpdateService)
    {
        $this->articleUpdateService = $articleUpdateService;
    }

    /**
     * Display the post-save edit view.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show(Article $article)
    {
        // タグを全て取得
        $tags = ArticleTag::orderBy('name', 'asc')->get();

        // 全部渡して画面を返す
        return view('article.edit', compact('article', 'tags'));
    }

    /**
     * Update the article's data.
     *
     * @param Article $article
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, StoreArticleRequest $request)
    {
        // バリデーション済みデータと記事を引数としてサービスを呼ぶ
        $article = $this->articleUpdateService->update($article, $request->validated());

        // 成功メッセージとリダイレクト先を指定
        return redirect()->route('articles.edit', $article->id)
            ->with([
                'success' => '<p class="fw-bold fs-3 mb-0">Success!</p>記事編集が完了しました',
            ]);
    }
}
