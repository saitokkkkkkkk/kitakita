<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class UpdateTagController extends Controller
{
    /**
     * Show the form for editing the specified tag.
     *
     * @param ArticleTag $articleTag
     * @return \Illuminate\Contracts\View\View
     */
    public function show(ArticleTag $articleTag)
    {
        return view('tag.edit', compact('articleTag'));
    }
}
