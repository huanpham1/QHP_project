<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
class GioHangController extends Controller
{
    public function ThemGH(Request $req, $id){
        // dd($data->json('MaSP'));
        // dd($sl);
        // $cart = (session()->get('GH'));
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        //     $cart[$id] = [
        //         "name" => 'a',
        //         "quantity" => 1,
        //         "price" => 'a',
        //         "image" => 'a'
        //     ];
        // }
        // dd($cart);
        $ma = DB::table('chitietsanpham')->where('MaSP', $id)->get('ChiTietSPID')[0]->ChiTietSPID;
        // dd($ma);
        if($ma !=null){
                $GHC = Session('GH')?Session('GH') : null;
                $GHM = new GioHang($GHC);
                $GHM->ThemGH($ma);

                $req->session()->put('GH',$GHM);
                $data = session()->get('GH');
                dd(session('GH'));
                // $data1 = $data->session()->get('GH');
                // dd(session('GH'));
            }
        return view('GioHang');
        // $ma = DB::table('chitietsanpham')->where('MaSP', [$data->json('MaSP')])->where('Size', [$data->json('Size')])->get('ChiTietSPID')[0]->ChiTietSPID;
        // if($data !=null){
        //     $GHC = Session('GH')?Session('GH') : null;
        //     $GHM = new GioHang($GHC);
        //     $GHM->ThemGH($ma, $data->json('SoLuong'));
        //     $data->session()->put('GH',$GHM);
        //     $data1 = $data->session()->get('GH');
        //     // dd(session('GH'));
        // }
        // dd($data);
        // return response()->json([$data1],200);
    }
    // public
}
