<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class theloai extends Model
{
    public function getAllTheLoai(){

        // Câu truy vấn lấy tất cả sinh viên
        $theloai = DB::select('SELECT * FROM theloai');

        return $theloai;
    }
}
