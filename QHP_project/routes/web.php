<?php

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
Route::prefix('/')->group(function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/DangNhap', function () {
    return view('DangNhap');
    });
    Route::get('/DangKy', function () {
        return view('DangKy');
    });
    Route::get('/GioHang', function () {
        return view('GioHang');
    });
});

Route::get('/adminsite', function () {
    return view('adminsite');
});

