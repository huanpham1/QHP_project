<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/DangNhap.css')}}">
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
                <a href="dangNhap.html">Log in</a>
                <pre>|</pre>
                <a href="dangKy.html">Register</a>
            </div>
        </div>
        <div class="hduoi">
            <a href="index.html"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
            <nav>
                <ul>
                    <li><a href="#">About us</a></li>
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
            <div class="acc_cart">
                <a class="acc" href="#"><div><i class="fa-solid fa-user"></i></div></a>
                <a href="GioHang.html"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
    </header>
    <section>
        <form action="/DangNhap/Auth" id="dangNhap" method="post">
            <table>
                <caption><h2>Đăng nhập</h2></caption>
                <tr>
                    <td>
                        <div class="icon_form"><i class="fa-solid fa-user"></i></div>
                        <input type="text" placeholder="Tên tài khoản" name="username" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        @error('username')
                            <span style="color: red; font-size: " class="thongbao">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="icon_form"><i class="fa-solid fa-lock"></i></div>
                        <input type="password" placeholder="Mật khẩu" name= "password">
                    </td>
                </tr>
                <tr>
                    <td>
                        @error('password')
                            <span style="color: red; font-size: " class="thongbao1">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="another_option"><a href="dangKy.html">Chưa có tài khoản? Đăng ký</a></td>
                </tr>
                <tr>
                    <td class="another_option"><a href="#" id="loginBtn">Quên mật khẩu?</a></td>
                </tr>
                <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                <tr>
                    <td id="submit"><input type="submit" value="Đăng nhập"></td>
                    @csrf
                </tr>


            </table>
        </form>
        <div id="forgot-pass-form">
            <form>
                <h3>Phục hồi mật khẩu</h3>
                <span>Chúng tôi sẽ gửi mật khẩu về email của bạn</span><br>
                <div class="form-box">
                    <div class="icon_form"><i class="fa-solid fa-envelope"></i></div>
                    <input type="text" placeholder="Email">
                </div>
                <div class="form-submit">
                    <input type="submit" value="Gửi">
                    <a href="#" id="submitBtn">Hủy bỏ</a>
                </div>
            </form>
        </div>
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

    <script type="text/javascript">
        document.getElementById("loginBtn").onclick = function(){
            document.getElementById("dangNhap").style.display = "none";
            document.getElementById("forgot-pass-form").style.display = "block";
            return false;
        }
        document.getElementById("submitBtn").onclick = function(){
            document.getElementById("forgot-pass-form").style.display = "none";
            document.getElementById("dangNhap").style.display = "";
            return false;
        }
    </script>
</body>
</html>
