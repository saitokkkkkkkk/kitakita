<?php

namespace App\Services\Member;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberUpdateService
{
    /**
     * Update the member's profile.
     *
     * @param Member $member
     * @param array $data
     * @return bool
     */
    public function updateProfile(array $data): bool
    {
        //ログイン中ユーザを取得
        $member = Auth::user();

        //更新してbool値を返却
        return $member->update($data);
    }
}
