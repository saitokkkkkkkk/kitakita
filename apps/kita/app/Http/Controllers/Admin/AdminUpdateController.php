<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;

class AdminUpdateController extends Controller
{
    public function show(adminUser $adminUser)
    {
        return view('admin.edit', compact('adminUser'));
    }
}
