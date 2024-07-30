<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;

class ArticleCreateController extends Controller
{
    public function show()
    {
        $tags = ArticleTag::all();

        return view('member.create', compact('tags'));
    }
}
