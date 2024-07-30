<?php

use App\Http\Controllers\Member\ArticleCreateController;
use App\Http\Controllers\Member\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Member\AfterSavingController;
use Illuminate\Support\Facades\Auth;
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

//Auth::routes();

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

//記事一覧画面表示
Route::get('/articles', [ArticleListController::class, 'index'])
    ->name('articles.index');

//ログイン状態の会員のみがアクセス可能なルート
Route::middleware(['auth:web'])->group(function () {
    //記事新規作成
    Route::controller(ArticleCreateController::class)->group(function () {
        Route::get('/articles/create', 'show')
            ->name('articles.create');
        Route::post('/articles', 'store')
            ->name('articles.store');
    });

    //記事新規作成、編集後の描画
    Route::get('/articles/{article}/edit', [AfterSavingController::class, 'show'])
        ->name('articles.edit');

    //ログアウト
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});

//強制ログアウト（ログアウトはpostなのでログアウトボタン作成まで一応いるっぽい）
Route::get('/force-logout', function () {
    Auth::logout();

    return redirect('/login');
});
