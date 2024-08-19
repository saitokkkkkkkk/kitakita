<?php

use App\Http\Controllers\Article\ArticleCreateController;
use App\Http\Controllers\Article\ArticleDeleteController;
use App\Http\Controllers\Article\ArticleDetailController;
use App\Http\Controllers\Article\ArticleEditController;
use App\Http\Controllers\Article\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Member\MemberPasswordController;
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

/*ログイン状態の会員のみがアクセス可能なルート
(記事一覧よりも上に書いて、/articles/createにアクセスした時に
記事詳細（articles/{article}）のルートが反応しないように)*/
Route::middleware(['auth:web'])->group(function () {

    Route::prefix('articles')->group(function () {
        //記事新規作成
        Route::controller(ArticleCreateController::class)->group(function () {
            Route::get('/create', 'show')
                ->name('articles.create');
            Route::post('/articles', 'store')
                ->name('articles.store');
        });

        //記事更新
        Route::controller(ArticleEditController::class)->group(function () {
            Route::get('/{article}/edit', 'show')
                ->name('articles.edit');
            Route::put('/{article}', 'update')
                ->name('articles.update');
        });

        //記事削除
        Route::delete('/{article}', [ArticleDeleteController::class, 'destroy'])
            ->name('article.destroy');
    });

    //ログアウト
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    //プロフィール編集
    Route::prefix('profile')->group(function () {
        Route::controller(MemberProfileController::class)->group(function () {
            Route::get('/', 'show')
                ->name('member.profile.show');
            Route::put('/', 'update')
                ->name('member.profile.update');
        });
    });

    //パスワード変更
    Route::put('/password_change', [MemberPasswordController::class, 'update'] )
        ->name('member.password.update');
});

//記事一覧と詳細の表示
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleListController::class, 'index'])
        ->name('articles.index');
    Route::get('/{article}', [ArticleDetailController::class, 'show'])
        ->name('article.details');
});
