<?php

use App\Http\Controllers\HomeController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

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
    Route::get('report', [PostController::class, 'create']);
    Route::post('report', [PostController::class, 'store']);
    Route::get('posts/{id}',[PostController::class, 'show']);

});


Route::get('login', [LoginController::class, 'loginWithFacebook']);
Route::get('login-success', [LoginController::class, 'loginCallBack']);
Route::get('logout', [LoginController::class, 'logout']);
