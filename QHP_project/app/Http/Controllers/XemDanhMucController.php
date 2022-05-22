<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\theloai;

class XemDanhMucController extends Controller
{
    public function index(){
        return view('XemDanhMuc');
    }
    public function goToXemDanhMuc($id){
        $sp = new sanpham();
        $sanpham = $sp->getSP_DanhMuc($id);

        $dm = new danhmuc();
        $dsdanhmuc = $dm->getAllDanhMuc();

        $dm2 = new danhmuc();
        $dmid = $dm2->getDanhMuc($id);

        $tl = new theloai();
        $theloai = $tl->getAllTheLoai();

        return view('XemDanhMuc', compact('sanpham','dsdanhmuc','dmid','theloai'));
    }
}
