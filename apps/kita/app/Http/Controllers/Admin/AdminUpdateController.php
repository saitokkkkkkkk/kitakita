<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\AdminUser;
use App\Services\Admin\AdminUpdateService;

class AdminUpdateController extends Controller
{
    /**
     * The service instance for updating admin users.
     *
     * @var AdminUpdateService
     */
    protected $adminUpdateService;

    /**
     * Create a new controller instance.
     *
     * @param AdminUpdateService $adminUpdateService
     * @return void
     */
    public function __construct(AdminUpdateService $adminUpdateService)
    {
        $this->adminUpdateService = $adminUpdateService;
    }

    /**
     * Show the form for editing the specified admin user.
     *
     * @param AdminUser $adminUser
     * @return \Illuminate\View\View
     */
    public function edit(AdminUser $adminUser)
    {
        return view('admin.edit', compact('adminUser'));
    }

    /**
     * Update the specified admin user in storage.
     *
     * @param UpdateAdminRequest $request
     * @param AdminUser $adminUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminRequest $request, AdminUser $adminUser)
    {
        // サービスで処理
        $this->adminUpdateService->update($request, $adminUser);

        // 更新後のデータを持ってリダイレクト
        return redirect()->route('admin.users.edit', $adminUser)
            ->with(['success' => '　更新処理が完了しました']);
    }
}
