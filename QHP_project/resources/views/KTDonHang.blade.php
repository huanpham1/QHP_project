@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/KTDonHang.css')}}">
    <div class="content">

        <div class="noi_dung">
            <div class="TieuDe">
                Kiểm Tra Đơn Hàng
            </div>
            <div class="form_check_DH">
                <form action="">
                    <table class="center">
                        <td class="Label">Mã Đơn hàng: </td>
                        <td><input type="text" class="MaDH" name="" id=""></td>
                    </table>
                    <input type="submit" name="" id="" value="Kiểm Tra" class="btn">
                </form>
            </div>
        </div>
    </div>

@endsection
