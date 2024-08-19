<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberPasswordController extends Controller
{
    public function update(UpdateMemberPasswordRequest $request)
    {
        // 現在のユーザーを取得
        $user = Auth::user();

        // パスワードを更新
        $user->password = Hash::make($request->newPassword);
        $user->save();

        // 成功メッセージと共にリダイレクト
        return redirect()->route('member.profile.show')
            ->with('success', 'パスワードを更新しました');
    }
}
