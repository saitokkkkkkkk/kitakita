<?php

namespace App\Services\Article;

use App\Http\Requests\StoreCommentRequest;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;

class ArticleCommentService
{
    public function addComment(StoreCommentRequest $request)
    {
        // ログイン中のユーザーIDを取得
        $memberId = Auth::id();

        // コメントデータ入れる
        $comment = new ArticleComment([
            'member_id' => $memberId,
            'article_id' => $request->article_id, // リクエストから直接プロパティとしてアクセス
            'contents' => $request->contents,
        ]);

        //コメント保存
        $comment->save();
    }
}
