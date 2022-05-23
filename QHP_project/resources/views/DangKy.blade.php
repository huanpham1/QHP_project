<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/DangKy.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
    <header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order"><a href="#"><p>Kiểm tra đơn hàng</p></a></div>
            <div class="login">
                <a href="{{route('DangNhap')}}">Đăng Nhập</a>
                <pre>|</pre>
                <a href="{{route('DangKy')}}">Đăng Ký</a>
            </div>
        </div>
        <div class="hduoi">
            <a href="index.html"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
            <nav>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li class="nam">
                        <a href="XemDanhMuc.html">Nam</a>
                        <ul class="namnam">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li class="nu">
                        <a href="XemDanhMuc.html">Nữ</a>
                        <ul class="nunu">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Trẻ em</a></li>
                </ul>
            </nav>
            <div class="search">
                <form action="#">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search">
                </form>
            </div>
            <div class="acc_cart" style="padding-right: 10px">
                @if (session()->has('TenTaiKhoan'))

                        <a class="acc" href="GioHang.html"><div><i class="fa-solid fa-user"></i>
                    @endif
                </div>
                </a>
                <a href="{{route('giohang')}}"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
    </header>
    <section>
        <form action="/DangKyinfo" method="post">
            <table>

                <caption><h2>Đăng ký tài khoản</h2></caption>
                <tr>
                    <td><label for="name">Họ và tên</label></td>
                    <td><input type="text" name="fullname"></td>
                    <span>
                        @error('fullname')
                            <div class="noti" style="top: 22%">{{$message}}</div>
                        @enderror
                    </span>
                </tr>
                <tr>
                    <td><label for="dateOfBirth">Ngày sinh</label></td>
                    <td><input type="date" name="dob"></td>
                    <span>
                        @error('dob')
                            <div class="noti" style="top: 34%">{{$message}}</div>
                        @enderror
                    </span>
                </tr>
                <tr>
                    <td><label for="username">Tên tài khoản</label></td>
                    <td><input type="text" name="username"></td>
                    <span>
                        @error('username')
                            <div class="noti" style="top: 46%">{{$message}}</div>
                        @enderror
                    </span>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="text" name="email"></td>
                    <span>
                        @error('email')
                            <div class="noti" style="top: 57%">{{$message}}</div>
                        @enderror
                    </span>
                </tr>
                <tr>
                    <td><label for="password">Mật khẩu</label></td>
                    <td><input type="password" name="password"></td>
                    <span>
                        @error('password')
                            <div class="noti" style="top: 68%">{{$message}}</div>
                        @enderror
                    </span>
                </tr>
                <tr>
                    <td><label for="phoneNum">Số điện thoại</label></td>
                    <td><input type="text" name="phoneNum"></td>
                    <span>
                        @error('phoneNum')
                            <div class="noti" style="top: 80.2%">{{$message}}</div>
                        @enderror
                    </span>
                    <div class="info">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </tr>
                <tr>
                    <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                    <td colspan="2" align="center" style="padding-top: 30px"><input type="submit" id="submit" value="SUBMIT"></td>
                    @csrf
                </tr>
            </table>
        </form>
    </section>
    <footer>
        <div class="container_footer">
        <div class="support">
            <p class="bold">SUPPORT</p>
            <p>Checking order</p>
            <p>Checkout Method</p>
            <p>Return Policy</p>
        </div>
        <div class="information">
            <p class="bold">INFORMATION</p>
            <p>Store Finder</p>
            <p>Cooperation with</p>
            <p>QHP</p>
            <p>Q&A</p>
        </div>
        <div class="about">
            <p class="bold">ABOUT'S QHP</p>
            <p>About QHP</p>
            <p>QHP Stories</p>
            <p>QHP Development</p>
            <p>Activities</p>
            <p>Contact Us</p>
        </div>
        <div class="LOGO"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></div>
        </div>
        <div class="copyright">© Copyright QHP Store</div>
    </footer>
</body>
</html>
