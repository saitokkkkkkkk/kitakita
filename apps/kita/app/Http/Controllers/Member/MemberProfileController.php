<?php

namespace app\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberProfileController extends Controller
{
    //描画
    public function show()
    {
        // 現在ログイン中のユーザを取得
        $member = Auth::user();

        // 必要な情報をビューに渡す
        return view('member.profile', [
            'name' => $member->name,
            'email' => $member->email
        ]);
    }
}
