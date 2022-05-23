<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danhmuc';

    public function getAllDanhMuc(){
        $allDanhMuc = DB::select('SELECT * FROM '.$this->table);

        return $allDanhMuc;
    }

    public function addDanhMuc($data){
        DB::insert('INSERT INTO '.$this->table.' (TenDanhMuc) VALUES (?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE MaDanhMuc = ?', [$id]);
    }

    public function updateDanhMuc($data, $id){
        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET TenDanhMuc=? WHERE MaDanhMuc = ?', $data);

    }

    public function deleteDanhMuc($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE MaDanhMuc=?', [$id]);
    }
}
