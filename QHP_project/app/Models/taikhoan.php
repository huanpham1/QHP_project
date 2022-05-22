<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class taikhoan extends Model
{
    
    public function layThongTinKH($MaTK){
        
        $tk = DB::select('SELECT * FROM taikhoan WHERE MaTK = '.$MaTK);

        return $tk;
    }
    public function SuaThongTin($MaTK,$HoVaTen,$NgaySinh,$Email,$DiaChi,$SoDT){
        $suaThongTin = DB::update('UPDATE taikhoan SET HoVaTen ='.$HoVaTen.',NgaySinh ='.$NgaySinh.',Email = '.$Email.',Diachi = '.$DiaChi.',SoDT = '.$SoDT);
        return $suaThongTin;
    }
}
