<?php

use App\Http\Controllers\HomeController;
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
Route::middleware('share.cate')->group(function(){

    Route::get('/',[HomeController::class, 'home']);

});

Route::get('image', function(){
    $imagePath =public_path().'/images/games/Lol.png';
    // Đọc nội dung của tệp hình ảnh
    $imageData = file_get_contents($imagePath);
    // Chuyển đổi nội dung thành mã base64
    $base64Image = 'data:image/png;base64,' . base64_encode($imageData);
    
    // In ra mã base64 đã chuyển đổi
    echo $base64Image;
});
