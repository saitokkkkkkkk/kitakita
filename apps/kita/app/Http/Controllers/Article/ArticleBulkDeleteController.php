<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleBulkDeleteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleBulkDeleteController extends Controller
{
    /**
     * @var ArticleBulkDeleteService
     */
    protected $articleBulkDeleteService;

    /**
     * ArticleBulkDeleteController constructor.
     *
     * @param ArticleBulkDeleteService $articleBulkDeleteService
     */
    public function __construct(ArticleBulkDeleteService $articleBulkDeleteService)
    {
        $this->articleBulkDeleteService = $articleBulkDeleteService;
    }

    /**
     * Bulk delete the selected articles using service class.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        // チェックされた記事を取得
        $articleIds = $request->input('articles', []);

        try {

            $result = $this->articleBulkDeleteService->deleteArticles($articleIds, Auth::id());

            // レスポンスを受け取ってjsonにする
            return response()->json([
                'success' => $result['success'],
                'message' => $result['message'],
            ]);

        /* サービスのトランザクション外でのエラーを拾うぽい */
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                // ユーザ向けメッセージ
                'message' => '削除中にエラーが発生しました。',
            ], 500);
        }
    }
}
