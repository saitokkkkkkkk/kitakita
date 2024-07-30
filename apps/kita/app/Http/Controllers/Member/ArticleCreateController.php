<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class ArticleCreateController extends Controller
{
    /**
     * Display the form for creating a new article providing a list of tags.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $tags = ArticleTag::all();

        return view('member.create', compact('tags'));
    }
}
