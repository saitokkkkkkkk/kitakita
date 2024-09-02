<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class TagDeleteController extends Controller
{
    public function destroy(ArticleTag $articleTag)
    {
        //タグを物理削除（中間テーブルのレコードも削除される）
        $articleTag->forceDelete();

        /*タグ一覧機能作成したらそこにリダイレクト
        return redirect()->route('')
        ->with('success', '削除処理が完了しました')
        */
    }
}
