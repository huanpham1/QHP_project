<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaySanPham;
use App\Models\LayTheLoai;
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
        $dsdanhmuc = $dm->getAllDanhMuc();

        $dm2 = new LayDanhMuc();
        $dmid = $dm2->getDanhMuc($id);

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        return view('XemDanhMuc', compact('sanpham','dsdanhmuc','dmid','theloai'));
    }
}
