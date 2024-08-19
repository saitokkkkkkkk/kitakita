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
     * Display the edit view for the article.
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Article $article)
    {

        // 編集画面の閲覧権限ない時は一覧に遷移
        if (! $this->articleUpdateService->hasEditPermission($article)) {
            return redirect()->route('articles.index');
        }

        // タグを全て取得
        $tags = ArticleTag::orderBy('name', 'asc')->get();

        // 編集画面の閲覧権限ある時
        return view('article.edit', compact('article', 'tags'));
    }

    /**
     * Update the article.
     *
     * @param ArticleUpdateService $articleUpdateService
     * @param Article $article
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleUpdateService $articleUpdateService, Article $article, StoreArticleRequest $request)
    {
        // サービスがtrueを返却した時
        if ($articleUpdateService->update($article, $request)) {
            return redirect()->route('articles.edit', $article)
                ->with('success', '記事編集が完了しました');

        // サービスがfalseを返却した時
        } else {
            return redirect()->route('article.index');
        }
    }
}
