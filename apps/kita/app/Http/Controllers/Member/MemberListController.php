<?php

namespace app\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberListController extends Controller
{
    //indexメソッドのみ
    public function index()
    {
        $members = Member::all();

        return view('member.index', compact('members'));
    }
}
