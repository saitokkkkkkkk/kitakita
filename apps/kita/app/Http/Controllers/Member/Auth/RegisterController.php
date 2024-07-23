<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterMemberRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistration()
    {
        return view('member.auth.register');
    }

    public function register(RegisterMemberRequest $request)
    {
        $member = Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::guard('web')->login($member);

        return redirect()->route('articles.index');
    }
}
