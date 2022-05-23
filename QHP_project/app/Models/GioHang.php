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
    public function ThemGH($IDSP, $SL){
        $newSP = ['CTSPID'=>$IDSP, 'SoLuong'=>$SL];
        $this->SanPham[$IDSP] = $newSP;
        // dd($SanPham);
        // if($this->SanPham){
        //     if(array_key_exists($IDSP,$this->SanPham))
        //         // $SP = $this->ChiTietSP[$id];
        //         $this->SoLuong+=$SL;
        //     else
        //         $this->SanPham[$IDSP]=$IDSP;
        //         $this->SoLuong=$SL;
        // }
        // $SPM['SoLuong']++;
        // $this->SanPham[$IDSP] = $SPM;
        // $this->SoLuong += $SPM['SoLuong'];
    }
}
