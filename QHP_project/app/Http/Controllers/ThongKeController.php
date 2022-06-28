<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index(){
        $chart_data = '';
        $row["cout"] = '2022-2-2';
        $row["fintot"] = 100;
        $chart_data .= "{ date:'".$row["cout"]."', profit:".$row["fintot"] *10/100 ."}, ";
        $chart_data = substr($chart_data, 0, -2);

        return view('admin.thongke', compact('chart_data'));
    }
}
