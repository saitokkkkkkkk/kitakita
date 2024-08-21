<?php

namespace App\Services\Member;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberPasswordService
{
    /**
     * Update the member's password.
     *
     * @param string $newPassword
     * @return void
     */
    public function updatePassword(string $newPassword): void
    {
        // 現在のユーザーを取得
        $member = Auth::user();

        // パスワードを更新
        $member->password = Hash::make($newPassword);
        $member->save();
    }
}
