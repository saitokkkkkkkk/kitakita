<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
use Illuminate\Http\Request;

class UpdateTagController extends Controller
{
    // タグの詳細表示画面（編集画面）を表示
    public function show(ArticleTag $articleTag)
    {
        // モデルバインディングにより、指定されたタグを取得
        return view('tag.edit', compact('articleTag'));
    }
}
