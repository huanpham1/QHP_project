<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\theloai;
use App\Models\danhmuc;
use App\Models\sanpham;
class XemTheLoaiController extends Controller
{
    //Action index
    public function index(){
        return view('XemTheLoai');
    }
    public function getSP_TheLoai($id){
        
        // Câu truy vấn lấy san pham theo id
        $sp= new sanpham();
        $sanpham = $sp->getSP_TheLoai($id);

        $tl = new theloai();
        $theloai = $tl->getAllTheLoai();

        $dm = new danhmuc();
        $danhmuc = $dm->getAllDanhMuc();
        
        return view('XemTheLoai', compact('sanpham','theloai','danhmuc'));
    }
}
