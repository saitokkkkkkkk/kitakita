<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Services\Admin\AdminDeleteService;

class AdminDeleteController extends Controller
{
    protected $adminDeleteService;

    /**
     * Constructor for AdminDeleteController.
     *
     * @param AdminDeleteService $adminDeleteService
     */
    public function __construct(AdminDeleteService $adminDeleteService)
    {
        $this->adminDeleteService = $adminDeleteService;
    }

    /**
     * Delete the admin user.
     *
     * @param AdminUser $adminUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AdminUser $adminUser)
    {
        $this->adminDeleteService->destroy($adminUser);

        return redirect()->route('admin.users.index')
            ->with('success', '削除処理が完了しました');
    }
}
