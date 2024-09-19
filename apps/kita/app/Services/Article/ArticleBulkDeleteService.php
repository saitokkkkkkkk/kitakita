<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleBulkDeleteService
{
    /**
     * Bulk delete the selected articles.
     *
     * @param array $articleIds
     * @param int $userId
     * @return array
     */
    public function deleteArticles(array $articleIds, int $userId): array
    {
        // 初期値設定
        $success = true;
        $message = '';

        try {
            // トランザクション（commitとrollbackは自動でやってくれる）
            DB::transaction(function () use (&$success, &$message, $articleIds, $userId) {

                // チェックされた記事の取得
                $articles = Article::whereIn('id', $articleIds)->get();

                // 全ての記事が本人のものであるかを先に確認
                if ($articles->every(fn ($a) => $a->member_id === $userId)) {
                    // 一括削除
                    Article::whereIn('id', $articleIds)->delete();
                    $message = '選択した記事を削除しました';
                } else {
                    $success = false;
                    $message = '削除権限がない記事が含まれています';
                    throw new \Exception($message); // catchへ
                }
            });

        } catch (\Exception $e) {
            // トランザクション内で発生したエラーをキャッチ
            $success = false;
            $message = $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
        ];
    }
}
