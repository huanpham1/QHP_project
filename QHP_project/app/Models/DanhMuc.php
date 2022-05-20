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
}
