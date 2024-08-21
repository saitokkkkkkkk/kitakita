<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param ...$guards
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    //認証時のリダイレクト先
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect('/admin/admin_users'); // 管理者の場合のリダイレクト先
                }
                return redirect('/articles'); // 会員の場合のリダイレクト先
            }
        }

        return $next($request);
    }
}
