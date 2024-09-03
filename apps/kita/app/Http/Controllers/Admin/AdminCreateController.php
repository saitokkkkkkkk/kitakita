<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Services\Admin\AdminCreateService;

class AdminCreateController extends Controller
{
    /**
     * The service instance for creating admin users.
     *
     * @var AdminCreateService
     */
    protected $adminCreateService;

    /**
     * Create a new controller instance.
     *
     * @param AdminCreateService $adminCreateService
     */
    public function __construct(AdminCreateService $adminCreateService)
    {
        $this->adminCreateService = $adminCreateService;
    }

    /**
     * Show the form for creating a new admin user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created admin user.
     *
     * @param StoreAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAdminRequest $request)
    {
        // $requestだけ渡してサービスを呼ぶ
        $adminUser = $this->adminCreateService->createAdmin($request);

        return redirect()->route('admin.users.edit', $adminUser)
            ->with(['success' => '登録処理が完了しました']);
    }
}
