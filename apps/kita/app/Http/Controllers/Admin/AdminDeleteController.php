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
     * Delete the admin.
     *
     * @param AdminUser $adminUser
     * @return void これも後で変更
     */
    public function destroy(AdminUser $adminUser)
    {
        $this->adminDeleteService->destroy($adminUser);

        //あとでリダイレクト先を追加
    }
}
