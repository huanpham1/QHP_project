<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    protected $fillable=[
        'ChiTietSPID', 'Size', 'SoLuongCon', 'MaSP'
    ];

    public function GetSanPham($id){
        $data = DB::table('sanpham')->where('MaSP', $id)->first();
        // dd($data);
        return $data;
    }
    public function GetIDSP($id){
        $data = DB::table('chitietsanpham')->where('ChiTietSPID', $id)->get("MaSP");
        // dd($data);
        return $data;
    }
    public function GetSoLuong($id){
        $data = (DB::table('chitietsanpham')->where('MaSP', $id)->first());

        return $data;
    }
    public function getSize($id,){
        $data = DB::table('chitietsanpham')->where('MaSP', $id)->get('Size');
        return $data;
    }
    public function getSizenew($id, $size){
        // DB::table('chitietsanpham')->where('MaSP', '1')->where('size','3')->get('SoLuongCon')[0]->SoLuongCon
        $data = (DB::table('chitietsanpham')->where('MaSP', (string)$id)->where('size',(string)$size)->get('SoLuongCon')[0]->SoLuongCon);
        return $data;
    }
    public function getCTSPID($id, $size){
        $data = DB::table('chitietsanpham')->where('MaSP', (string)$id)->where('Size', (string)$size)->get('ChiTietSPID')[0]->ChiTietSPID;
        // $data = (DB::table('chitietsanpham')->where('MaSP', (string)$id)->where('Size', (string)$size)->get('ChiTietSPID'));
        return $data;
    }
    
    public function getCT($id){
        $data = DB::table('chitietsanpham')->where('ChiTietSPID', $id)->first();
        // $data = (DB::table('chitietsanpham')->where('MaSP', (string)$id)->where('Size', (string)$size)->get('ChiTietSPID'));
        return $data;
    }
}
