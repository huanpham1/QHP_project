<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    public $SanPham = null;

    public function __construct($GH)
    {
        if($GH){
            $this->SanPham = $GH->SanPham;
        }
    }
    public function ThemGH($IDSP){
        $newSP = ['SL'=>'1'];
        // dd($IDSP);
        $this->SanPham[$IDSP] = $newSP;
        // dd($SanPham);
        if($this->SanPham){
            if(isset($this->SanPham[$IDSP]))
                // $SP = $this->ChiTietSP[$id];
                $this->SoLuong+=1;
            else
                $this->SanPham[$IDSP]=$IDSP;
                // $this->SoLuong='1';
        }
        // $SPM['SoLuong']++;
        // $this->SanPham[$IDSP] = $SPM;
        // $this->SoLuong += $SPM['SoLuong'];
    }
}
