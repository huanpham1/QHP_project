<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SanPham;
class SanPhamController extends Controller
{
    //
    private $SanPham;
    public function __construct()
    {
        $this->SanPham = new SanPham();
    }
    public function ChiTiet($id){
        // dd($id);
        $data =  $this->SanPham->GetSanPham($id);
        // dd($id);
        $SoLuong =  ($this->SanPham->GetSoLuong($id));

        $Size = ($this->SanPham->getSize($id));
        // dd($Size[0]);
        $CTSPID = $this->SanPham->getCTSPID($id, $Size[0]->Size);
        $img = DB::table('sanpham')->where('MaSP',$id)->get('HinhAnh')[0]->HinhAnh;
        // dd($img);
        return view('ChiTietSP', compact('data', 'SoLuong', 'Size', 'CTSPID', 'img'));
    }
    public function GetSL(Request $data){
        // dd($data);
        $SoLuong = ($this->SanPham->getSizenew($data->json('MaSP'), $data->json('Size')));
        return response()->json([$SoLuong],200);
    }
    
}
