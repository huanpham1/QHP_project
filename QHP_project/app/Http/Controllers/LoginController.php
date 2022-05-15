<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    //
    public function __construct()
    {

    }
    public function LoginAuth(Request $request){

        $request->validate([
            'username'=>'required|regex:/^[\w_-]+$/|max:20',
            'password'=>'required|min:6|regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!$#%*]).*$/'
        ],[
            'username.required'=>'Bắt buộc nhập tên tài khoản',
            'usernane.regex'=>'tài khoản phải không hợp lệ',
            'password.required'=>'Bắt buộc nhập Mật khẩu',
            'password.min'=>'Mật khẩu quá ngắn',
            
        ]);
        $alldata = $request->all();
        dd($alldata);
        return view('home');
    }
    public function checkdata(){
        $data = DB::select('SELECT * FROM `taikhoan` WHERE 1');
        dd($data);
    }
}
