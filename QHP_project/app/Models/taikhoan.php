<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class taikhoan extends Model
{

    public function layThongTinKH($MaTK){

        $tk = DB::select('SELECT * FROM taikhoan WHERE TenTaiKhoan = '.$MaTK);

        return $tk;
    }
    public function SuaThongTin($data){
        $suaThongTin = DB::update('UPDATE taikhoan SET HoVaTen = ?,NgaySinh = ?,Email = ?,DiaChi = ?,SoDT = ? WHERE TenTaiKhoan = ?',$data);
        return $suaThongTin;
    }
}
