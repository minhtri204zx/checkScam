<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTraderController;
use App\Http\Controllers\Admin\CategoryController;
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
Route::middleware('check.role')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-reports/{id}', [AdminController::class, 'show']);
    Route::delete('/admin-reports/{id}', [AdminController::class, 'destroy']);
    Route::put('/admin-reports/{id}', [AdminController::class, 'update']);

    Route::get('/admin-categories', [CategoryController::class, 'index']);
    Route::get('/admin-categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/admin-categories/{id}', [CategoryController::class, 'update']);
    Route::get('/admin-categories/create', [CategoryController::class, 'create']);
    Route::post('/admin-categories', [CategoryController::class, 'store']);
    Route::delete('/admin-categories/{id}', [CategoryController::class, 'destroy']);

    Route::get('/admin-traders', [AdminTraderController::class, 'index']);
    Route::get('/admin-traders/create', [AdminTraderController::class, 'create']);
    Route::post('/admin-traders', [AdminTraderController::class, 'store']);

    Route::get('/admin-accounts', [AdminAccountController::class, 'index']);
    Route::put('/admin-accounts/update/{id}', [AdminAccountController::class, 'update']);
});
Route::get('login-with-google', [LoginController::class, 'loginWithGoogle']);
Route::get('login', [LoginController::class, 'loginWithFacebook']);
Route::get('login-success', [LoginController::class, 'loginCallBack']);
Route::get('login-success-google', [LoginController::class, 'callBackGoogle']);
Route::get('logout', [LoginController::class, 'logOut']);
