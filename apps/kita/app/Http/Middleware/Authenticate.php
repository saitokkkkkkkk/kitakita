<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        // JSONリクエストの場合はリダイレクトしない
        if ($request->expectsJson()) {
            return null;
        }

        // uriに基づいてガードとルートを先に取得
        $isAdmin = $request->is('admin/*');
        $guard = $isAdmin ? 'admin' : 'web';
        $route = $isAdmin ? 'admin.login.show' : 'show.login';

        // リダイレクト先の決定
        if (! Auth::guard($guard)->check()) { // 未認証の時
            return route($route);
        }

        return null; // 認証済みの場合はリダイレクトしない
    }
}
