<?php

namespace App\Services\Member;

use App\Models\Member;

class MemberUpdateService
{
    /**
     * Update the member's profile.
     *
     * @param Member $member
     * @param array $data
     * @return bool
     */
    public function updateProfile(Member $member, array $data): bool
    {
        return $member->update($data);
    }
}
