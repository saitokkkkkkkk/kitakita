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
        $adminUser->update($request->validated());

        return $adminUser;
    }
}
