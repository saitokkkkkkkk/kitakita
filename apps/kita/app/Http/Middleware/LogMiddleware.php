<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // リクエスト情報をログに記録
        Log::info('前処理 URL: '.$request->fullUrl());

        $response = $next($request);

        // レスポンス情報をログに記録
        Log::info('後処理 Status Code: '.$response->getStatusCode());

        return $response;
    }
}
