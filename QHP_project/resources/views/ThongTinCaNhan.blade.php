
@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/ThongTinCaNhan.css')}}">
    <section>
        @foreach($taikhoan as $data)
    <div class="ThongTinCaNhan">
            <table>
                <caption><h2>Thông tin cá nhân</h2></caption>
                <tr>
                    <td><label for="name">Họ và tên</label></td>
                    <td><div class="hoTen">{{$data->HoVaTen}}</div></td>
                </tr>
                <tr>
                    <td><label for="dateOfBirth">Ngày sinh</label></td>
                    <td><div class="ngaysinh"><?php echo $data->NgaySinh?></div></td>
                </tr>
                <tr>
                    <td><label for="username">Tên tài khoản</label></td>
                    <td><div class="username"><?php echo $data->TenTaiKhoan?></div></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><div class="email"><?php echo $data->Email?></div></td>
                </tr>
                <tr>
                    <td><label for="DiaChi">Địa chỉ</label></td>
                    <td><div class="DiaChi"><?php echo $data->DiaChi?></div></td>
                </tr>
                <tr>
                    <td><label for="SoDT">Số điện thoại</label></td>
                    <td><div name="SoDT"><?php echo $data->SoDT?></div></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="{{route('ThongTinCaNhan.suaThongTin')}}"><input id="btn_thaydoi" type="button" value="Thay đổi"></a></td>
                </tr>
            </table>
        </div>
        @endforeach
    </section>
@endsection
