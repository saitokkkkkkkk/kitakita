<?php

use App\Http\Controllers\Article\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
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

//会員ログイン、ログアウト
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')
        ->name('show.login');
    Route::post('/login', 'login')
        ->name('login');
    Route::post('/logout', 'logout')
        ->name('logout');
});

//記事一覧画面表示
Route::get('/articles', [ArticleListController::class, 'index'])
    ->name('articles.index');
