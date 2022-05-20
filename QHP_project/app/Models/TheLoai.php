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
}
