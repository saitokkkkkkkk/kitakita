<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class TagListController extends Controller
{
    public function index()
    {
        // ArticleTags モデルから全データを取得
        $articleTags = ArticleTag::all();

        // ビューにデータを渡して表示
        return view('tag.index', compact('articleTags'));
    }
}
