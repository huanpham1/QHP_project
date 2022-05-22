<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class sanpham extends Model
{
    public function getSP_TheLoai($id){
        
        // Câu truy vấn lấy san pham theo id
        $sp= DB::select('SELECT * FROM sanpham WHERE MaTheLoai = ?',[$id]);
        
        return $sp;
    }
    function getAllSanPham_Nu(){

        $sp = DB::select('SELECT * FROM sanpham WHERE MaDanhMuc = 2');
        
        return $sp;
    }
    function getAllSanPham_Nam(){

        $sp = DB::select('SELECT * FROM sanpham WHERE MaDanhMuc = 1');
        
        return $sp;
    }
    function getSP_DanhMuc($iddm){
        
        // Câu truy vấn lấy san pham theo danh muc
        $sp = DB::select('SELECT * FROM sanpham WHERE MaDanhMuc = '.$iddm);
        
        return $sp;
    }
    function getSanPham($id){

        // Câu truy vấn lấy san pham theo id
        $sp = DB::select('SELECT * FROM sanpham WHERE MaSP = '.$id);
        
        return $sp;
    }
    function getSP_Name($name){
        
        // Câu truy vấn lấy san pham theo ten
        $sp = DB::select('SELECT * FROM sanpham WHERE TenSP ='.$name);
    
        return $sp;
    }
}
