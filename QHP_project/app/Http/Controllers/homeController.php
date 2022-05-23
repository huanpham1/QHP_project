<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function home(){
        $SanPhamList = DB::select('SELECT * FROM `sanpham` WHERE 1');
        // dd($data);
        return view("home", compact('SanPhamList'));
    }
    public function register(){
        return view('DangNhap');
    }
    public function test(){
        session()->put('GH',['a']);
        session()->put('GH',['b']);
        dd(Session()->get('GH'));
    }
=======
use App\Models\sanpham;
use App\Models\theloai;
use App\Models\danhmuc;

class homeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function goHome(){
        
        $spnam = new sanpham();
        $sanphamnam = $spnam->getAllSanPham_Nam();

        $spnu = new sanpham();
        $sanphamnu = $spnu->getAllSanPham_Nu();

        $tl = new theloai();
        $theloai = $tl->getAllTheLoai();

        $dm = new danhmuc();
        $danhmuc = $dm->getAllDanhMuc();
        
        return view('home', compact('sanphamnam','sanphamnu','theloai','danhmuc'));
    }

>>>>>>> PhongBranch
}
