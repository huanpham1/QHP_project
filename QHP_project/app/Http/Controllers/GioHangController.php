<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
class GioHangController extends Controller
{
    public function __construct()
    {
        $this->SanPham = new SanPham();
    }
    public function index(){
        // dd(session()->get('cart'));
        $SP = null;
        if(session('cart')){
            foreach(session('cart') as $id => $item){
                $SP[$id] = [$this->SanPham->getCT($id), $this->SanPham->GetSanPham($this->SanPham->GetIDSP($id)[0]->MaSP),"SoLuong"=>$item["SoLuong"]];

            }

        }
        // dd($SP);
        return view('GioHang', compact("SP"));
    }
    public function ThemGH(Request $req, $id){
        $ma = DB::table('chitietsanpham')->where('MaSP', $id)->get('ChiTietSPID')[0]->ChiTietSPID;
        // dd($ma);
        if($ma !=null){
                $GHC = Session('GH')?Session('GH') : null;
                $GHM = new GioHang($GHC);
                $GHM->ThemGH($ma);

                $req->session()->put('GH',$GHM);
                $data = session()->get('GH');
                // $data1 = $data->session()->get('GH');
                // dd($data);

            }
        return view('GioHang', compact('sl'));
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
    public function addToCart(Request $request)
    {
        // $ma = DB::table('chitietsanpham')->where('MaSP', $id)->get('ChiTietSPID')[0]->ChiTietSPID;
        $id =  $request->json('CTSPID');
        $cart = session()->get('cart', []);
        $slCon = ($this->SanPham->getCT($id))->SoLuongCon;
        $slthem = $request->json('SoLuong');
        if(isset($cart[$id])) {
            $slco = $cart[$id]['SoLuong'] + $slthem;
            if($slco<$slCon){
                $cart[$id]['SoLuong']+=$request->json('SoLuong');
                session()->put('cart', $cart);
                $sl = count(Session('cart'));
                return response()->json([$sl],200);
            }
            else return response()->json(["400"],400);

        } else {
            if($slthem<$slCon){
                $cart[$id] = [
                    "SoLuong" => $request->json('SoLuong')
                ];
                session()->put('cart', $cart);
                $sl = count(Session('cart'));
                return response()->json([$sl],200);
            }else return response()->json(["403"],400);
        }




    }
    public function update(Request $request)
    {
        $id =  $request->json('ID');
        $sl = $request->json('SL');
        $slCon = ($this->SanPham->getCT($id))->SoLuongCon;
        if($sl<$slCon){
            $cart = session()->get('cart');
            $cart[$id]["SoLuong"] = $sl;
            session()->put('cart', $cart);
            return response()->json([" "],200);
        }
        else
            return response()->json(400);
        // if($request->id && $request->quantity){
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->quantity;
        //     session()->put('cart', $cart);
        //     session()->flash('success', 'Cart updated successfully');
        // }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        $id =  $request->json('ID');

        if($request) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return response()->json([$id],200);
    }
}
