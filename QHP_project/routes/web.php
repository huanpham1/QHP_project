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
    Route::get('/dangNhap', function () {
    return view('DangNhap');
    });
    Route::get('/dangKy', function () {
        return view('DangKy');
    });
    Route::get('/GioHang', function () {
        return view('GioHang');
    });
    Route::get('/XemDanhMuc', function () {
        return view('XemDanhMuc');
    });
    Route::get('/XemTheLoai/{id}',function($id){
        $idtl = [
            'id' => $id
        ];
        return view('XemTheLoai',$idtl);
    }) -> name('xemTheLoai');
    Route::get('/xemChiTiet/id={id}', function ($id) {
        $idsp = [
            'id' => $id
        ];
        return view('xemChiTiet',$idsp);
    }) -> name('chiTiet');
});

Route::get('/adminsite', function () {
    return view('adminsite');
});

