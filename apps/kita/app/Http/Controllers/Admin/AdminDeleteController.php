<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Services\Admin\AdminDeleteService;

class AdminDeleteController extends Controller
{
    protected $adminDeleteService;

    public function __construct(AdminDeleteService $adminDeleteService)
    {
        $this->adminDeleteService = $adminDeleteService;
    }

    public function destroy(AdminUser $adminUser)
    {
        $this->adminDeleteService->destroy($adminUser);
    }
}
