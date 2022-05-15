<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class SignIn extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    public function addUser($data){
        DB::insert('INSERT INTO '.$this->table.' (HoVaTen, NgaySinh, TenTaiKhoan, Email, MatKhau, SoDT, DiaChi,TTGioHang, TinhTrang)
        VALUES (?, ?, ?, ?, ?, ?, 1, 0, 0)', $data);
    }
}
