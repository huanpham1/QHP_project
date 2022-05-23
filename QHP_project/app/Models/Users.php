<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'taikhoan';

    public function getAllUsers(){
        $users = DB::select('SELECT * FROM '.$this->table);

        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO '.$this->table.' (HoVaTen, NgaySinh, TenTaiKhoan, Email, MatKhau, SoDT, IsAdmin, DiaChi)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE MaTK = ?', [$id]);
    }

    public function updateUser($data, $id){
        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET 
        HoVaTen=?,
        NgaySinh=?,
        TenTaiKhoan=?,
        Email=?,
        MatKhau=?,
        SoDT=?,
        IsAdmin=?,
        DiaChi=?
        WHERE MaTK = ?', $data);
    }

    public function deleteUser($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE MaTK=?', [$id]);
    }
}