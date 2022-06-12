<?php

namespace App\Http\Controllers;
use App\Models\LayDanhMuc;
use App\Models\LayTheLoai;
use App\Models\GioHang;
use App\Models\SanPham;

use Illuminate\Http\Request;

class ThanhToanController extends Controller
{   
    public function __construct()
    {
        $this->SanPham = new SanPham();
    }
    public function goToThanhToan(){

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();

        // dd(session()->get('cart'));
        $SP = null;
        if((session()->has('TenTaiKhoan'))){
            $loaigio = 'GH';
            $cart = json_decode((Storage::disk('local')->get(session()->get('TenTaiKhoan').'.txt')), true);
            session()->put($loaigio, $cart);
            // dd((session('GH')));
        }
        else
            $loaigio = 'cart';
        if(session($loaigio)){
            foreach(session($loaigio) as $id => $item){
                $SP[$id] = [$this->SanPham->getCT($id), $this->SanPham->GetSanPham($this->SanPham->GetIDSP($id)[0]->MaSP),"SoLuong"=>$item["SoLuong"]];
            }
        }
        // dd($SP);
        return view("ThanhToan", compact('theloai','danhmuc', 'SP'));
    } 
}
