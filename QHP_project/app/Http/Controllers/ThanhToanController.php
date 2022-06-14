<?php

namespace App\Http\Controllers;
use App\Models\LayDanhMuc;
use App\Models\LayTheLoai;
use App\Models\GioHang;
use App\Models\SanPham;
use App\Models\Orders;
use App\Models\taikhoan;

use Illuminate\Http\Request;

class ThanhToanController extends Controller
{   
    public function __construct()
    {
        $this->SanPham = new SanPham();
    }
    public function goToThanhToan(Request $request){

        $tl = new LayTheLoai();
        $theloai = $tl->getAllTheLoai();

        $dm = new LayDanhMuc();
        $danhmuc = $dm->getAllDanhMuc();

        // dd(session()->get('cart'));
        $MaTK = $request->session()->get('MaTK',1);
        $tk = new taikhoan();
        $taikhoan = $tk->layThongTinKH($MaTK);
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
        return view("ThanhToan", compact('taikhoan','theloai','danhmuc', 'SP'));
    } 
    public function insertDH(Request $request){
        $rule = [
            'name' => 'required|min:5',
            'DiaChi' => 'required',
            'diaChiNhanHang' => 'required|min:20',
            'phoneNum' => 'numeric|min:10'
        ];
        $message = [
            'required' => ':attribute không được để trống !',
            'min' => ':attribute phải có ít nhất :min kí tự !',
            'numeric' => ':attribute không đúng định dạng !'
        ];
        $request->validate($rule,$message);
        $MaTK = $request->session()->get('MaTK',1);
        $order = new Orders();
        $dsdh[] = $order->layDSDH();       
        $key = count($dsdh[0]);     
        //DD($dsdh);
        if(count($dsdh) > 0){
            $madh = 'DH'.($key+1);
        }
        else
            $madh = 'DH1';
        $ngayDatHang = date('Y-m-d',time());
        $ngayNhanHang = date('Y-m-d',time() + 5*24*60*60);
        $hinhThucVanChuyen = 'COD';
        $data = [
            $madh,
            $ngayDatHang,
            $hinhThucVanChuyen,
            $ngayNhanHang,
            $request->diaChiNhanHang,   
            $request->phoneNum,
            $request->ghiChu,
            $MaTK,
            $request->tongTien,
            $trangthai = NULL
        ];
        $order->insertDH($data);
        $listSP[] = $request->session()->get('SP');
        //DD($listSP);
        foreach($listSP as $SP){
            //DD($SP);
            $chiTietSPID = $SP[2][0]->ChiTietSPID;
            $soLuong = $SP[2]["SoLuong"];
            $giaBan = $SP[2][1]->GiaBan;
            $datactdh = [
                $madh,
                $chiTietSPID,
                $soLuong,
                $giaBan
            ];
            $order->insertCTDH($datactdh);
        }
        
        return redirect()->route('home')->with('Đặt hàng thành công !!!');
    }
}
