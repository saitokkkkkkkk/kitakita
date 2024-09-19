<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Article\ArticleDeleteService;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Article $article)
    {
        // 記事削除（ajaxもそうでないのも共通)
        $success = $this->articleDeleteService->deleteArticle($article);

        // レスポンスにJSONを期待している場合
        // =記事一覧からの削除
        // =Acceptヘッダーにapplication/jsonを含んでいる時
        if ($request->expectsJson()) {
            return response()->json([
                'success' => $success,
                'message' => $success ? '記事を削除しました' : '削除権限がありません',
            ]);
        }

        // 非JSONリクエストの場合
        // =記事詳細からの削除（メッセージを持って記事一覧にリダイレクト）
        return redirect()->route('articles.index')
            ->with($success ? 'success' : 'error',
                   $success ? '記事を削除しました' : '削除に失敗しました');
    }
}
