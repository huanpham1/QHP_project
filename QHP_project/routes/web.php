<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;
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
Route::prefix('/')->group(function(){
    Route::get('/', [homeController::class, 'home'])->name('home');
    Route::get('/DangNhap', [homeController::class, 'register'])->name('DangNhap');
    Route::get('/DangKy', function () {
        return view('DangKy');
    })->name('DangKy');
    Route::get('/GioHang', function () {
        return view('GioHang');
    })->name('giohang');
    Route::get('/LogInAdmin', function () {
        return view('LogInAdmin');
    });
    Route::post('/DangKyinfo',[SignInController::class,'checkinfo']);
    Route::get('/Products/ChiTiet/{id}', [SanPhamController::class, 'ChiTiet'])->name('chitiet');

});
route::get('/test', [homeController::class, 'test'])->name('test');
Route::post('getsl', [SanPhamController::class, 'GetSL'])->name('getSL');
route::post('/ThemGH', [GioHangController::class, 'ThemGH'])->name('ThemGH');
Route::post("/DangNhap/Auth",[LoginController::class , 'LoginAuth']);
Route::get('/adminsite', function () {
    return view('adminsite');
});

