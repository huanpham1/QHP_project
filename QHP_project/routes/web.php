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
    Route::get('/XemDanhMuc/{id}', function ($id) {
        $iddm = [
            'id' => $id
        ];
        return view('XemDanhMuc',$iddm);
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
    Route::post('/xemChiTiet/name={name}', function ($name) {
        $namesp = [
            'name' => $name
        ];
        return view('xemChiTiet',$namesp);
    });
    Route::get('/SuaThongTinCaNhan/{MaTK}',function($MaTK){
        $id = [
            'MaTK'=>$MaTK
        ];
        return view('SuaThongTinCaNhan',$id);
    });
    Route::post('/Sua/{MaTK}/{HoVaTen}/{NgaySinh}/{Email}/{DiaChi}{SoDT}',function($MaTK,$HoVaTen,$NgaySinh,$Email,$DiaChi,$SoDT){
        $id = [
            'MaTK'=>$MaTK,
        ];
        $ten = [
            'HoVaTen'=>$HoVaTen,
        ];
        $ngaysinh = [
            'NgaySinh'=>$NgaySinh,
        ];
        $email = [
            'Email'=>$Email,
        ];
        $diachi = [
            'DiaChi'=>$DiaChi,
        ];
        $sdt = [
            'SoDT'=>$SoDT,
        ];
        return view('SuaThongTinCaNhan',$id,$ten,$ngaysinh,$email,$diachi,$sdt);
    });
    Route::get('/ThongTinCaNhan',function(){
        return view('ThongTinCaNhan');
    });
});

Route::get('/adminsite', function () {
    return view('adminsite');
});

