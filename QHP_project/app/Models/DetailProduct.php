<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class DetailProduct extends Model
{
    use HasFactory;

    protected $table = 'chitietsanpham';

    public function getAllDetail($id){
        return DB::select('SELECT * FROM '.$this->table.', sanpham WHERE '.$this->table.'.MaSP=sanpham.MaSP AND sanpham.MaSP=?', [$id]);
    }

    public function addDetailProduct($data){
        DB::insert('INSERT INTO '.$this->table.' (ChiTietSPID, Size, SoLuongCon, MaSP) VALUES(?, ?, ?, ?)', $data);
    }

    public function getDetailProduct($detailID){
        return DB::select('SELECT * FROM '.$this->table.' WHERE ChiTietSPID=?', [$detailID]);
    }

    public function updateDetailProduct($data, $detailID){
        $data[] = $detailID;

        return DB::update('UPDATE '.$this->table.' SET 
        Size=?,
        SoLuongCon=?
        WHERE ChiTietSPID = ?', $data);
    }

    public function deleteDetailProduct($detailID){
        return DB::delete('DELETE FROM '.$this->table.' WHERE ChiTietSPID=?', [$detailID]);
    }
}
