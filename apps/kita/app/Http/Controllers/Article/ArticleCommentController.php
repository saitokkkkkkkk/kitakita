<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Services\Article\ArticleCommentService;

class ArticleCommentController extends Controller
{
    protected $articleCommentService;

    public function __construct(ArticleCommentService $articleCommentService)
    {
        $this->articleCommentService = $articleCommentService;
    }

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
