<?php

namespace App\Services\Admin;

use App\Models\AdminUser;

class AdminDeleteService
{
    /**
     * Delete administrator user.
     *
     * @param AdminUser $adminUser
     * @return void
     */
    public function destroy(AdminUser $adminUser)
    {
        $adminUser->delete();
    }
}
