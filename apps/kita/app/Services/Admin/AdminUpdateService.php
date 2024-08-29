<?php

namespace App\Services\Admin;

use App\Http\Requests\UpdateAdminRequest;
use App\Models\AdminUser;

class AdminUpdateService
{
    /**
     * Service class for handling admin user updates.
     *
     * @param UpdateAdminRequest $request
     * @param AdminUser $adminUser
     * @return AdminUser
     */
    public function update(UpdateAdminRequest $request, AdminUser $adminUser)
    {
        // 値の取り出し
        $validated = $request->validated();

        // データの更新
        $adminUser->update([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
        ]);

        return $adminUser;
    }
}
