<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;
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
    Route::get('/search-products', [ProductsController::class, 'search'])->name('search-products');
    Route::get('/checkout',[SignInController::class, 'checkout'])->name('checkout');
});
route::get('/test', [homeController::class, 'test'])->name('test')->middleware('checkadmin');
Route::post('getsl', [SanPhamController::class, 'GetSL'])->name('getSL');
route::get('/ThemGH/{id}', [GioHangController::class, 'ThemGH'])->name('ThemGH');
Route::post("/DangNhap/Auth",[LoginController::class , 'LoginAuth']);
Route::post("/DangNhap/Admin",[LoginController::class , 'LoginAdmin'])->name('LoginAdmin');
// Route::get('/adminsite', function () {
//     return view('adminsite');
// });
Route::get('/checkoutAdmin',[SignInController::class, 'checkoutadmin'])->name('checkoutadmin');

// Route::prefix('/')->group(function(){
//     Route::get('/', function () {
//         return view('home');
//     })->name('home');
//     Route::get('/DangNhap', function () {
//         return view('DangNhap');
//     });
//     Route::get('/DangKy', function () {
//         return view('DangKy');
//     });
//     Route::get('/GioHang', function () {
//         return view('GioHang');
//     });
//     Route::get('/DanhMuc', function(){
//         return view('DanhMuc');
//     });

// });

Route::middleware('checkadmin')->prefix('/adminsite')->group(function () {
    Route::get('/', function(){
        return view('admin.adminsite');
    })->name('adminsite');
    
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

        Route::get('/delete/{id}', [ProductsController::class, 'delete'])->name('delete');

        Route::prefix('/detail')->name('details.')->group(function(){
            Route::get('/{id}', [DetailProductController::class, 'index'])->name('index');

            Route::get('/{id}/add', [DetailProductController::class, 'add'])->name('add');

            Route::post('/{id}/add', [DetailProductController::class, 'handleAdd'])->name('post-add');

            Route::get('/{id}/edit/{detailID}', [DetailProductController::class, 'getEdit'])->name('edit');

            Route::post('/{id}/update', [DetailProductController::class, 'handleEdit'])->name('post-edit');

            Route::get('/{id}/delete/{detailID}', [DetailProductController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('/danhmuc')->name('danhmuc.')->group(function(){
        Route::get('/', [DanhMucController::class, 'index'])->name('index');

        Route::get('/add', [DanhMucController::class, 'add'])->name('add');

        Route::post('/add', [DanhMucController::class, 'handleAdd'])->name('post-add');

        Route::get('/edit/{id}', [DanhMucController::class, 'getEdit'])->name('edit');

        Route::post('/update', [DanhMucController::class, 'handleEdit'])->name('post-edit');

        Route::get('/delete/{id}', [DanhMucController::class, 'delete'])->name('delete');
    });

    Route::prefix('/theloai')->name('theloai.')->group(function(){
        Route::get('/', [TheLoaiController::class, 'index'])->name('index');

        Route::get('/add', [TheLoaiController::class, 'add'])->name('add');

        Route::post('/add', [TheLoaiController::class, 'handleAdd'])->name('post-add');

        Route::get('/edit/{id}', [TheLoaiController::class, 'getEdit'])->name('edit');

        Route::post('/update', [TheLoaiController::class, 'handleEdit'])->name('post-edit');

        Route::get('/delete/{id}', [TheLoaiController::class, 'delete'])->name('delete');
    });

    Route::prefix('/order')->name('orders.')->group(function(){
        Route::get('/', [OrdersController::class, 'index'])->name('index');

        Route::get('/detail/{id}', [OrdersController::class, 'detail'])->name('detail');

        Route::get('/delete/{id}', [OrdersController::class, 'delete'])->name('delete');
    });
});

