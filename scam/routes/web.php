<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminCommentsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTraderController;
use App\Http\Controllers\admin\BankController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\ComunityController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\HomeController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\TraderController;

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

Route::middleware('share.cate')->group(function () {
    Route::get('/', [HomeController::class, 'home']);

    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts/{id}', [PostController::class, 'show']);
    Route::get('/load-more', [PostController::class, 'loadMore']);
    Route::get('search', [PostController::class, 'search']);

    Route::get('traders', [TraderController::class, 'index']);
    Route::get('traders/{id}', [TraderController::class, 'show']);
    Route::get('/load-more-traders', [TraderController::class, 'loadMore']);

    Route::post('comment', [CommentController::class, 'store']);
    Route::get('like/{id}', [CommentController::class, 'like']);
    Route::get('unlike/{id}', [CommentController::class, 'unlike']);
});
Route::get('/admin', [AdminLoginController::class, 'showLogin']);
Route::post('/admin-login', [AdminLoginController::class, 'login']);

// Admin
Route::middleware('check.role')->group(function () {
    // reports
    Route::get('/admin-reports', [AdminController::class, 'index']);
    Route::get('/admin-reports/create', [AdminController::class, 'create']);
    Route::post('/admin-reports', [AdminController::class, 'store']);
    Route::get('/admin-reports/{id}', [AdminController::class, 'show']);
    Route::delete('/admin-reports/{id}', [AdminController::class, 'destroy']);
    Route::put('/admin-reports/{id}', [AdminController::class, 'update']);

    //categories
    Route::get('/admin-categories', [CategoryController::class, 'index']);
    Route::get('/admin-categories/create', [CategoryController::class, 'create']);
    Route::post('/admin-categories', [CategoryController::class, 'store']);
    Route::get('/admin-categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/admin-categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/admin-categories/{id}', [CategoryController::class, 'destroy']);

    // traders
    Route::get('/admin-traders', [AdminTraderController::class, 'index']);
    Route::get('/admin-traders/create', [AdminTraderController::class, 'create']);
    Route::post('/admin-traders', [AdminTraderController::class, 'store']);

    // comments
    Route::get('/admin-comments', [AdminCommentsController::class, 'index']);

    // communities
    Route::get('/admin-communities', [ComunityController::class, 'index']);
    Route::get('/admin-communities/create', [ComunityController::class, 'create']);
    Route::post('/admin-communities', [ComunityController::class, 'store']);
    Route::get('/admin-communities/{id}/edit', [ComunityController::class, 'edit']);
    Route::put('/admin-communities/{id}', [ComunityController::class, 'update']);
    Route::delete('/admin-communities/{id}', [ComunityController::class, 'destroy']);

    // accounts
    Route::get('/admin-accounts', [AdminAccountController::class, 'index']);
    Route::get('/admin-accounts/create', [AdminAccountController::class, 'create']);
    Route::post('/admin-accounts', [AdminAccountController::class, 'store']);
    Route::put('/admin-accounts/update/{id}', [AdminAccountController::class, 'update']);

    // banners
    Route::get('/admin-banners', [AdminBannerController::class, 'index']);
    Route::get('/admin-banners/create', [AdminBannerController::class, 'create']);
    Route::post('/admin-banners', [AdminBannerController::class, 'store']);
    Route::get('/admin-banners/{id}/edit', [AdminBannerController::class, 'edit']);
    Route::put('/admin-banners/{id}', [AdminBannerController::class, 'update']);
    Route::delete('/admin-banners/{id}', [AdminBannerController::class, 'destroy']);

    // Banks
    Route::get('/admin-banks', [BankController::class, 'index']);
    Route::get('/admin-banks/create', [BankController::class, 'create']);
    Route::post('/admin-banks', [BankController::class, 'store']);
    Route::delete('/admin-banks/{id}', [BankController::class, 'destroy']);

    // Posters
    Route::get('/admin-posters', [PosterController::class, 'index']);
    Route::get('/admin-posters/{id}/edit', [PosterController::class, 'edit']);
    Route::put('/admin-posters/{id}', [PosterController::class, 'update']);

});

// login
Route::get('login-with-google', [LoginController::class, 'loginWithGoogle']);
Route::get('login', [LoginController::class, 'loginWithFacebook']);
Route::get('login-success', [LoginController::class, 'loginCallBack']);
Route::get('login-success-google', [LoginController::class, 'callBackGoogle']);
Route::get('logout', [LoginController::class, 'logOut']);
