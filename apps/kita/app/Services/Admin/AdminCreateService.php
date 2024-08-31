<?php

namespace App\Services\Admin;

use App\Http\Requests\StoreAdminRequest;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminCreateService
{
    /**
     * Create a new administrator user.
     *
     * @param StoreAdminRequest $request
     * @return AdminUser
     */
    public function createAdmin(StoreAdminRequest $request): AdminUser
    {
        // データを入れる
        return AdminUser::create([
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
