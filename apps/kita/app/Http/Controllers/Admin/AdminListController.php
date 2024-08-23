<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminListController extends Controller
{
    /**
     * Display a listing of the admin users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ビューを返す
        return view('admin.index');
    }
}
