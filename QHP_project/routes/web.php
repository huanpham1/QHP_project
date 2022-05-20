<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

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
    Route::get('/DanhMuc', function(){
        return view('DanhMuc');
    });
});

Route::prefix('/adminsite')->group(function () {
    Route::get('/', function(){
        return view('admin.adminsite');
    });

    Route::prefix('/user')->name('users.')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('index');

        Route::get('/add', [UsersController::class, 'add'])->name('add');

        Route::post('/add', [UsersController::class, 'handleAdd'])->name('post-add');

        Route::get('/edit/{id}', [UsersController::class, 'getEdit'])->name('edit');

        Route::post('/update', [UsersController::class, 'handleEdit'])->name('post-edit');

        Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
    });

    Route::prefix('/product')->name('products.')->group(function(){
        Route::get('/', [ProductsController::class, 'index'])->name('index');

        Route::get('/add', [ProductsController::class, 'add'])->name('add');

        Route::post('/add', [ProductsController::class, 'handleAdd'])->name('post-add');

        Route::get('/edit/{id}', [ProductsController::class, 'getEdit'])->name('edit');

        Route::post('/update', [ProductsController::class, 'handleEdit'])->name('post-edit');
    });
});

