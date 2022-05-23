<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayTaiKhoan;

class ThongTinCaNhanController extends Controller
{
    public function index(){
        return view('ThongTinCaNhan');
    }
    public function goToThongTinCaNhan(Request $request){
        $MaTK = $request->session()->get('MaTK',1);
        $tk = new LayTaiKhoan();
        $taikhoan = $tk->layThongTinKH($MaTK);
        return view('ThongTinCaNhan', compact('taikhoan'));
    }
    public function formSua(Request $request){
        $MaTK = $request->session()->get('MaTK',1);
        $tk = new LayTaiKhoan();
        $taikhoan = $tk->layThongTinKH($MaTK);
        return view('SuaThongTinCaNhan',compact('taikhoan'));
    }
    public function postSua(Request $request){
        $rule = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'dateOfBirth' => 'required',
            'phoneNum' => 'numeric'
        ];
        $message = [
            'required' => ':attribute bat buoc phai nhap !',
            'min' => ':attribute phai co it nhat :min ki tu !',
            'email' => ':attribute khong dung dinh dang!',
            'numeric' => ':attribute khong dung dinh dang !'
        ];
        $request->validate($rule,$message);
        $MaTK = $request->session()->get('MaTK',1);
        $tk = new LayTaiKhoan();
        $data = [
            $request->name,
            $request->dateOfBirth,
            $request->email,
            $request->DiaChi,
            $request->phoneNum,
            $MaTK
        ];
        $taikhoan = $tk->SuaThongTin($data);
        
        return redirect()->route('ThongTinCaNhan.index')->with('Sửa thành công !!!');
    }
}
