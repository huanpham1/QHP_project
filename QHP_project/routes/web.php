<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XemTheLoaiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\XemDanhMucController;
use App\Http\Controllers\xemChiTietController;
use App\Http\Controllers\ThongTinCaNhanController;

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
Route::prefix('/')->name('index')->group(function(){
    Route::get('/', [homeController::class,'goHome'])->name('index');
});
Route::prefix('XemTheLoai')->name('XemTheLoai.')->group(function(){
    Route::get('/{id}',[XemTheLoaiController::class,'getSP_TheLoai'])->name('index');
});
Route::prefix('XemDanhMuc')->name('XemDanhMuc.')->group(function(){
    Route::get('/{id}',[XemDanhMucController::class,'goToXemDanhMuc'])->name('index');
});
Route::prefix('xemChiTiet')->name('xemChiTiet.')->group(function(){
    Route::get('/{id}',[xemChiTietController::class,'goToXemChiTiet'])->name('index');
});
Route::prefix('ThongTinCaNhan')->name('ThongTinCaNhan.')->group(function(){
    Route::get('/',[ThongTinCaNhanController::class,'goToThongTinCaNhan'])->name('index');
    Route::get('/Sua',[ThongTinCaNhanController::class,'formSua'])->name('suaThongTin');
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

Route::get('/adminsite', function () {
    return view('adminsite');
});

