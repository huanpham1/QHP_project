<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\LaySanPham;
use App\Models\LayTheLoai;
use App\Models\LayDanhMuc;
class XemTheLoaiController extends Controller
{
    //Action index
    public function index(){
        return view('XemTheLoai');
    }
    public function getSP_TheLoai($id){
        
        // Câu truy vấn lấy san pham theo id
        $sp= new LaySanPham();
        $sanpham = $sp->getSP_TheLoai($id);

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();
        
        return view('XemTheLoai', compact('sanpham','theloai','danhmuc'));
    }
}
