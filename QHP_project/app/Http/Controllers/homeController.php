<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function home(){
        $SanPhamList = DB::select('SELECT * FROM `sanpham` WHERE 1');
        // dd($data);
        return view("home", compact('SanPhamList'));
    }
    public function register(){
        return view('Them');
    }
    public function test(){
        session()->put('GH',['a']);
        session()->put('GH',['b']);
        dd(Session()->get('GH'));
    }
}
