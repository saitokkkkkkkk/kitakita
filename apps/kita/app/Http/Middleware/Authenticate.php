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
        if (! $request->expectsJson()) {
            // URIに基づいて認証状態を確認
            if ($request->is('admin/*')) {
                // 管理者エリアのリクエスト
                if (! Auth::guard('admin')->check()) {
                    return route('show.admin.login'); // 未認証管理者のリダイレクト先
                }
            } else {
                // 会員エリアのリクエスト
                if (! Auth::guard('web')->check()) {
                    return route('show.login'); // 未認証会員のリダイレクト先
                }
            }
        }

        // 認証済みの場合か、jsonリクエストの場合はnullを返す
        return null;
    }
}
