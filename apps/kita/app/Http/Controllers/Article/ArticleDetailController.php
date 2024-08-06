<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleDetailController extends Controller
{
    /**
     * Display the details of the clicked article.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $article = Article::with('tags', 'member')->findOrFail($id);
        //ビューではなくコントローラで処理しとく
        $userId = auth()->id();
        $canEditOrDelete = $userId && $userId === $article->member_id;

        return view('article.details', compact('article', 'canEditOrDelete'));
    }
}
