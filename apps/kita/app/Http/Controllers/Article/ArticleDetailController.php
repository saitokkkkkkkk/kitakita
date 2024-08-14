<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleDetailController extends Controller
{
    /**
     * Display the details of the clicked article.
     *
     * @param \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        $article->load('tags', 'member');
        //ビューではなくコントローラで処理しとく
        $userId = auth()->id();
        $canEditOrDelete = $userId && $userId === $article->member_id;

        return view('article.details', compact('article', 'canEditOrDelete'));
    }
}
