<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberProfileRequest;
use App\Models\Member;
use App\Services\Member\MemberUpdateService;
use Illuminate\Support\Facades\Auth;

class MemberProfileController extends Controller
{
    protected $memberUpdateService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\Member\MemberUpdateService $memberUpdateService
     * @return void
     */
    public function __construct(MemberUpdateService $memberUpdateService)
    {
        $this->memberUpdateService = $memberUpdateService;
    }

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
     * @param \App\Http\Requests\UpdateMemberProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemberProfileRequest $request)
    {

        // サービスでプロフィール更新
        $success = $this->memberUpdateService->updateProfile($request->only(['name', 'email']));

        // メッセージをセッションに追加してリダイレクト
        if ($success)
        {
            //更新成功したとき
            return redirect()->route('member.profile.show')
                ->with('success', 'プロフィールが更新されました。');
        } else {
            //更新失敗したとき
            return redirect()->route('member.profile.show')
                ->with('error', 'プロフィールの更新に失敗しました。');
        }
    }
}
