<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberPasswordRequest;
use App\Services\Member\MemberPasswordService;

class MemberPasswordController extends Controller
{
    /**
     * The member password service instance.
     *
     * @var MemberPasswordService
     */
    protected $passwordService;

    /**
     * Create a new controller instance.
     *
     * @param MemberPasswordService $passwordService
     */
    public function __construct(MemberPasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    /**
     * Update the member's password.
     *
     * @param UpdateMemberPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemberPasswordRequest $request)
    {
        // パスワードを更新するサービスメソッドを呼び出す
        $this->passwordService->updatePassword($request->newPassword);

        // 成功メッセージと共にリダイレクト
        return redirect()->route('member.profile.show')
            ->with('success', 'パスワードを更新しました');
    }
}
