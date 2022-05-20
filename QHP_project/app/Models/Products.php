<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public function getAllProducts(){
        $products = DB::select('SELECT MaSP, TenSP, GiaBan, MoTa, HinhAnh, TenTheLoai, TenDanhMuc FROM '. $this->table . ', theloai, danhmuc
        WHERE ' . $this->table . '.MaTheLoai = theloai.MaTheLoai AND ' . $this->table . '.MaDanhMuc = danhmuc.MaDanhMuc');

        return $products;
    }

    public function addProduct($data){
        DB::insert('INSERT INTO '.$this->table.' (TenSP, GiaBan, MoTa, HinhAnh, MaTheLoai, MaDanhMuc)
        VALUES (?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE MaSP = ?', [$id]);
    }

    public function updateProduct($data, $id){
        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET 
        TenSP=?,
        GiaBan=?,
        MoTa=?,
        HinhAnh=?,
        MaTheLoai=?,
        MaDanhMuc=?
        WHERE MaSP = ?', $data);
    }

    public function deleteProduct($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE MaSP=?', [$id]);
    }
}
