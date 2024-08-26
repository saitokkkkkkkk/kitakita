<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class UpdateTagController extends Controller
{
    // タグの詳細表示画面（編集画面）を表示
    public function show(ArticleTag $articleTag)
    {
        return view('tag.edit', compact('articleTag'));
    }
}
