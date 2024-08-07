<?php

use App\Http\Controllers\Article\ArticleDetailController;
use App\Http\Controllers\Article\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Member\MemberProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//会員登録
Route::controller(RegisterController::class)->group(function () {
    Route::get('/member_registration', 'showRegistrationForm')
        ->name('show.registration');
    Route::post('/member_registration', 'register')
        ->name('member.registration');
});

//会員ログイン
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')
        ->name('show.login');
    Route::post('/login', 'login')
        ->name('login');
});

//記事一覧と詳細の表示
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleListController::class, 'index'])
        ->name('articles.index');
    Route::get('/{article}', [ArticleDetailController::class, 'show'])
        ->name('article.details');
});

//ログイン状態の会員のみがアクセス可能なルート
Route::middleware(['auth:web'])->group(function () {
    //プロフィール編集
    Route::controller(MemberProfileController::class)->group(function () {
        Route::get('/profile', 'show')
            ->name('member.profile.show');
        Route::put('/profile', 'update')
            ->name('member.profile.update');
    });

    //ログアウト
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});
