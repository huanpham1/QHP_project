<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\LaySanPham;
use App\Models\LayTheLoai;
use App\Models\LayDanhMuc;
use App\Models\SanPham;

class homeController extends Controller
{
    public function home(){
        // dd($data);
        $spnam = new LaySanPham();
        $SanPhamList = $spnam->getAllSanPham_Nam();

        $spnu = new LaySanPham();
        $sanphamnu = $spnu->getAllSanPham_Nu();

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();
        
        //return view('home', compact('sanphamnam','sanphamnu','theloai','danhmuc'));
        return view("home", compact('SanPhamList','sanphamnu','theloai','danhmuc'));
    }
    public function register(){
        return view('DangNhap');
    }
    public function test(){

        dd(count(Session('cart')));
    }
}
