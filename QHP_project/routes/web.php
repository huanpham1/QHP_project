<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
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
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/DangNhap', [homeController::class, 'register'])->name('register');
    Route::get('/DangKy', function () {
        return view('DangKy');
    });
    Route::get('/GioHang', function () {
        return view('GioHang');
    });
    Route::get('/LogInAdmin', function () {
        return view('LogInAdmin');
    });

});
Route::post("/DangNhap/Auth",[LoginController::class , 'LoginAuth']);
Route::get('/adminsite', function () {
    return view('adminsite');
});

