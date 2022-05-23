<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
class GioHangController extends Controller
{
    public function ThemGH(Request $data){
        // dd($data->json('MaSP'));
        // dd($sl);
        $ma = DB::table('chitietsanpham')->where('MaSP', [$data->json('MaSP')])->where('Size', [$data->json('Size')])->get('ChiTietSPID')[0]->ChiTietSPID;
        if($data !=null){
            $GHC = Session('GH')?Session('GH') : null;
            $GHM = new GioHang($GHC);
            $GHM->ThemGH($ma, $data->json('SoLuong'));
            $data->session()->put('GH',$GHM);
            $data1 = $data->session()->get('GH');
            // dd(session('GH'));
        }
        // dd($data);
        return response()->json([$data1],200);
    }
    // public
}
