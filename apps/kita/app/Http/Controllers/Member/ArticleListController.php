<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class ArticleListController extends Controller
{
    //view()の引数としてcompact('articles')を一覧画面機能作成時に追加
    public function index()
    {
        //$articles = Article::all();
        return view('member.index');
    }
}
