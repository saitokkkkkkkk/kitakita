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
        $user = Auth::user();

        // パスワードを更新
        $user->password = Hash::make($newPassword);
        $user->save();
    }
}
