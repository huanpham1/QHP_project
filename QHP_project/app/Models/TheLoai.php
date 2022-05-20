<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class TheLoai extends Model
{
    use HasFactory;

    protected $table = 'theloai';

    public function getAllTheLoai(){
        $allTheLoai = DB::select('SELECT * FROM '.$this->table);

        return $allTheLoai;
    }

    public function addTheLoai($data){
        DB::insert('INSERT INTO '.$this->table.' (TenTheLoai) VALUES (?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE MaTheLoai = ?', [$id]);
    }

    public function updateTheLoai($data, $id){
        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET TenTheLoai=? WHERE MaTheLoai = ?', $data);

    }

    public function deleteTheLoai($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE MaTheLoai=?', [$id]);
    }
}
