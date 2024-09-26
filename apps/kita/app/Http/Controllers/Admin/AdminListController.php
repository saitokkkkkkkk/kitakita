<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminSearchService;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    /**
     * @var AdminSearchService
     */
    protected $adminSearchService;

    /**
     * Create a new controller instance.
     *
     * @param AdminSearchService $adminSearchService
     * @return void
     */
    public function __construct(AdminSearchService $adminSearchService)
    {
        $this->adminSearchService = $adminSearchService;
    }

    /**
     * Display a listing of the admin users.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // サービスクラスを使用して管理者ユーザーを取得
        $adminUsers = $this->adminSearchService->getAdminUsers($request);

        // ビューに結果を渡して表示
        return view('admin.index', compact('adminUsers'));
    }
}
