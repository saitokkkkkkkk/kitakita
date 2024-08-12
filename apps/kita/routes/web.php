<?php

use App\Http\Controllers\Article\ArticleEditController;
use App\Http\Controllers\Article\ArticleCreateController;
use App\Http\Controllers\Article\ArticleDetailController;
use App\Http\Controllers\Article\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
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

/*ログイン状態の会員のみがアクセス可能なルート
(記事一覧よりも上に書いて、/articles/createにアクセスした時に
記事詳細（articles/{article}）のルートが反応しないように)*/
Route::middleware(['auth:web'])->group(function () {

    Route::prefix('articles')->group(function() {
        Route::controller(ArticleCreateController::class)->group(function () {
            //記事新規作成の表示
            Route::get('/create', 'show')
                ->name('articles.create');
            //新規記事の保存
            Route::post('/articles', 'store')
                ->name('articles.store');
        });

        Route::controller(ArticleEditController::class)->group(function () {
            //記事編集画面の表示
            Route::get('/{article}/edit', 'show')
                ->name('articles.edit');
            //記事更新
            Route::put('/{article}', 'update')
                ->name('articles.update');
        });

    });

    //ログアウト
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});

//記事一覧と詳細の表示
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleListController::class, 'index'])
        ->name('articles.index');
    Route::get('/{article}', [ArticleDetailController::class, 'show'])
        ->name('article.details');
});
