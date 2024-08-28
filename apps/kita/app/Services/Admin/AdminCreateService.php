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
        // こっちでバリデーション済みデータを取り出す
        $validated = $request->validated();

        // データを入れる
        return AdminUser::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    }
}
