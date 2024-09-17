<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleBulkDeleteController extends Controller
{
    public function destroy(Request $request)
    {
        // チェックされた記事IDを取得
        $articleIds = $request->input('articles', []);

        // 記事が一つもチェックされてない場合
        if (empty($articleIds)) {
            return response()->json([
                'success' => false,
                'message' => '記事が選択されていません。',
            ], 400); // 400 Bad Request
        }

        $success = true;

        foreach ($articleIds as $id) {
            $article = Article::find($id);

            // 記事が存在し、ログインユーザーがその記事の所有者であるか確認
            if ($article && auth()->user()->id === $article->member_id) {
                try {
                    $article->delete(); // 記事を削除
                } catch (\Exception $e) {
                    Log::error('削除エラー: '.$e->getMessage()); // エラーメッセージをログに記録
                    $success = false; // 削除に失敗した場合
                }
            } else {
                $success = false; // 所有者でない場合や記事が存在しない場合
            }
        }

        // レスポンスを返す
        return response()->json([
            'success' => $success,
            'message' => $success ? '選択した記事を削除しました。' : '削除に失敗しました。',
        ], $success ? 200 : 500);
    }
}
