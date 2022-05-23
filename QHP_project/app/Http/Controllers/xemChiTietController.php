<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaySanPham;
use App\Models\LayTheLoai;
use App\Models\LayDanhMuc;

class xemChiTietController extends Controller
{
    //
    public function index(){
        return view('xemChiTiet');
    }
    public function goToXemChiTiet($id){
        $sp = new LaySanPham();
        $sanpham = $sp->getSanPham($id);

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();
        return view('xemChiTiet', compact('sanpham','theloai','danhmuc'));
    }
}
