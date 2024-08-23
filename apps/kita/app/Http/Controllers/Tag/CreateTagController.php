<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\ArticleTag;

class CreateTagController extends Controller
{
    //新規タグ追加の画面表示
    public function show()
    {
        return view('tag.create');
    }

    //新規タグ追加
    public function store(StoreTagRequest $request)
    {
        //バリデーション済みデータを保存
        $articleTag = ArticleTag::create([
            'name' => $request->input('name'),
        ]);

        // 保存完了したらリダイレクト
        return redirect()->route('tags.edit', ['articleTag' => $articleTag->id])
            ->with([
                'success' => '登録処理が完了しました',
            ]);
    }
}
