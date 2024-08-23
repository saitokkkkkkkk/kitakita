<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // URIに基づいて認証状態を確認
        if ($request->is('admin/*')) {
            // 管理者エリアのリクエスト
            if (Auth::guard('admin')->check()) {
                return redirect('/admin/admin_users'); // 認証済み管理者のリダイレクト先
            }
        } else {
            // 会員エリアのリクエスト
            if (Auth::guard('web')->check()) {
                return redirect('/articles'); // 認証済み会員のリダイレクト先
            }
        }

        // 未認証の場合、このミドルウェアはスルー
        return $next($request);
    }
}
