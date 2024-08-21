<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateTagController extends Controller
{
    //タグ新規追加の画面表示
    public function show()
    {
        return view('tag.create');
    }

    //新規タグの追加
    public function store(Request $request)
    {

    }
}
