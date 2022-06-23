<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\SanPham;
use App\Models\LaySanPham;
use App\Models\LayTaiKhoan;
use App\Models\LayTheLoai;
use App\Models\theloai;
use App\Models\LayDanhMuc;


class XemDanhMucController extends Controller
{
    public function index(){
        return view('XemDanhMuc');
    }
    public function goToXemDanhMuc($id){
        $sp = new LaySanPham();
        $sanpham = $sp->getSP_DanhMuc($id);

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();

        $dm2 = new LayDanhMuc();
        $dmid = $dm2->getDanhMuc($id);

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $spnam = new LaySanPham();
        $SanPhamList = $spnam->getAllSanPham_Nam();

        return view('XemDanhMuc', compact('SanPhamList','sanpham','danhmuc','dmid','theloai'));
    }
}
