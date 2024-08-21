<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Services\Article\ArticleCommentService;

class ArticleCommentController extends Controller
{
    /**
     * @var ArticleCommentService
     */
    protected $articleCommentService;

    /**
     * ArticleCommentController constructor.
     *
     * @param ArticleCommentService $articleCommentService
     */
    public function __construct(ArticleCommentService $articleCommentService)
    {
        $this->articleCommentService = $articleCommentService;
    }

    /**
     * Add comments.
     *
     * @param StoreCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(StoreCommentRequest $request)
    {
        // サービスを使ってコメント保存
        $this->articleCommentService->addComment($request);

        // 保存完了したらリダイレクト
        return redirect()->route('article.details', ['article' => $request->article_id])
            ->with([
                'success' => 'コメント投稿が完了しました',
            ]);
    }
}
