<?php

use App\Http\Controllers\Admin\AdminListController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Article\ArticleCommentController;
use App\Http\Controllers\Article\ArticleCreateController;
use App\Http\Controllers\Article\ArticleDeleteController;
use App\Http\Controllers\Article\ArticleDetailController;
use App\Http\Controllers\Article\ArticleEditController;
use App\Http\Controllers\Article\ArticleListController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Member\MemberListController;
use App\Http\Controllers\Member\MemberPasswordController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\Tag\TagCreateController;
use App\Http\Controllers\Tag\TagUpdateController;
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

    //コメント投稿
    Route::post('/comments', [ArticleCommentController::class, 'addComment'])
        ->name('articles.comment.store');

    //パスワード変更
    Route::put('/password_change', [MemberPasswordController::class, 'update'])
        ->name('member.password.update');
});

//記事一覧と詳細の表示
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleListController::class, 'index'])
        ->name('articles.index');
    Route::get('/{article}', [ArticleDetailController::class, 'show'])
        ->name('article.details');
});

//以下、管理者のルート
Route::prefix('admin')->name('admin.')->group(function () {
    // ログイン、ログアウト（ミドルウェはコントローラで効かせてる）
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')
            ->name('login.show');
        Route::post('/login', 'login')
            ->name('login');
        Route::post('/logout', 'logout')
            ->name('logout');
    });

    // 以下、管理者として認証状態ならアクセス可能
    Route::middleware('auth:admin')->group(function () {
        // 管理者関連のルート（admin/admin_users）
        Route::prefix('admin_users')->group(function () {
            // 管理者一覧表示
            Route::get('/', [AdminListController::class, 'index'])
                ->name('users.index');
        });

        // タグ関連のルート（admin/article_tags）
        Route::prefix('article_tags')->group(function () {
            //タグ新規登録
            Route::controller(TagCreateController::class)->group(function () {
                Route::get('/create', 'show')
                    ->name('tags.create');
                Route::post('/', 'store')
                    ->name('tags.store');
            });
            //タグ編集
            Route::controller(TagUpdateController::class)->group(function () {
                Route::get('{articleTag}/edit', 'show')
                    ->name('tags.edit');
            });
        });

        // 会員関連のルート（admin/users）機能追加の可能性を考えてこれもprefix
        Route::prefix('users')->group(function () {
            Route::get('/', [MemberListController::class, 'index'])
                ->name('members.index');
        });
    });
});
