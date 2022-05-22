<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\taikhoan;

class ThongTinCaNhanController extends Controller
{
    //
    public function index(){
        return view('ThongTinCaNhan');
    }
    public function goToThongTinCaNhan(Request $request){
        $MaTK = $request->session()->get('MaTK',1);
        $tk = new taikhoan();
        $taikhoan = $tk->layThongTinKH($MaTK);
        return view('ThongTinCaNhan', compact('taikhoan'));
    }
    public function formSua(){
        session(['canhbao'=>'']);
        return view('SuaThongTinCaNhan');
    }
    public function postSua(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'reqired|email',
            'dateOfBirth' => 'required|date'
        ],[
            'name.required' => 'Ho va ten bat buoc phai nhap !',
            'name.min' => 'Ho ten phai co it nhat :min ki tu !',
            'email.required' => 'Email bat buoc phai nhap !',
            'email.email' => 'Email khong dung dinh dang!'
        ]);
        return 'ok';
    }
}
