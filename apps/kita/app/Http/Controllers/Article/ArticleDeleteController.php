<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Article\ArticleDeleteService;
use Illuminate\Http\RedirectResponse;

class ArticleDeleteController extends Controller
{
    /**
     * The article service instance.
     *
     * @var ArticleDeleteService
     */
    protected $articleDeleteService;

    /**
     * Create a new controller instance.
     *
     * @param ArticleDeleteService $articleDeleteService
     */
    public function __construct(ArticleDeleteService $articleDeleteService)
    {
        $this->articleDeleteService = $articleDeleteService;
    }

    /**
     * Handle the deletion of an article.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article)
    {
        //サービスを使って記事削除
        if ($this->articleDeleteService->deleteArticle($article)) {
            // セッションにメッセージを追加してリダイレクト
            return redirect()->route('articles.index')
                ->with('success', '<p class="fw-bold fs-3 mb-0">Success!</p>記事を削除しました');
        }

        //削除権限がない時は単にリダイレクト
        return redirect()->route('articles.index');
    }
}
