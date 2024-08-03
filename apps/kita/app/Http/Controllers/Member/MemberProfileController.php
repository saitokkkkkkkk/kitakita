<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberProfileRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberProfileController extends Controller
{
    /**
     * Display the logged-in member's profile.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show()
    {
        // 現在ログイン中のユーザーを取得
        /** @var Member $member */
        $member = Auth::user();

        // 必要な情報をビューに渡す
        return view('member.profile', [
            'name' => $member->name,
            'email' => $member->email,
        ]);
    }

    /**
     * Update the member's profile.
     *
     * @param  \App\Http\Requests\UpdateMemberProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemberProfileRequest $request)
    {
        //ログイン中のユーザ取得
        $member = Auth::user();
        //バリデーション済みデータでupdate
        $member->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // 成功メッセージをセッションに追加し、プロフィールページにリダイレクト
        return redirect()->route('member.profile.show')
            ->with('success', '<strong>Success!</strong><br>プロフィールが更新されました。');
    }
}
