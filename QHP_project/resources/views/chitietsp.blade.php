<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ChiTiet.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
    <header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order"><a href="#">Kiểm tra đơn hàng</a></div>
            <div class="login">
                @if (!(session()->has('TenTaiKhoan')))
                    <a href="{{route('DangNhap')}}">Đăng Nhập</a>
                    <pre>|</pre>
                    <a href="./DangKy">Đăng Ký</a>
                @endif
                </div>
        </div>
        <div class="hduoi">
            <a href="{{route('home')}}"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            <nav>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li class="nam">
                        <a href="/XemDanhMuc">Nam <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <ul class="namnam">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li class="nu">
                        <a href="/XemDanhMuc">Nữ <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
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
                @if (session()->has('TenTaiKhoan'))
                    <a class="acc" ><div><i class="fa-solid fa-user"></i></div>
                        <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                        <div class="loguot" onclick="logout()">Logout </div>
                    </a>

                @endif

            <a href="{{route('giohang')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                    {{-- <div class="SoLuongSP">5</div> --}}
                    </i><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>

            </div>
        </div>
    </header>
    <div class="chiTietSP">
        <div class="Containerimage">
            <img name = "img_sp" src="<?php echo asset('storage/products/'.$img)?>" alt="Giay">

        </div>
        <div class="containerInfor">
            <div class="name">{{$data->TenSP}}</div>
            <div class="ma">Mã sản phẩm: {{$data->MaSP}}</div>
            <div class="gia">{{$data->GiaBan}}đ</div>
            <div class="kichco">
                <div class="text">Kích cỡ: </div>
                <select name="SIZE" class="size" id="size" onchange="getSL({{$data->MaSP}})">
                    @foreach ($Size as $item)
                        <option herf="/a" value="{{$item->Size}}">{{$item->Size}}</option>
                    @endforeach
                </select>
            </div>

            <div class="soluong">
                <div class="txtsl">Số lượng:</div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                  </div>
            </div>
            @if(($SoLuong=== NULL))
                <div class="soluong">
                    <div class="txtsl">Tình trạng:</div>
                    <div class="kq"> Hết hàng</div>
                </div>
            @else
                <div class="soluong">
                    <div class="txtsl">Tình trạng:</div>
                    <div class="kq"> còn {{$SoLuong->SoLuongCon}} sản phẩm</div>
                </div>
            @endif
            {{-- onclick="window.location='{{ route('giohang') }}'" --}}
            <div class="btn">
                <button class="themVaoGio" onclick="ThemGHMOI()">THÊM VÀO GIỎ</button>
                <button class="thanhToan" type="submit">THANH TOÁN</button>
            </div>
        </div>

    </div>
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
        <div class="copyright">© Copyright QHP Store </div>
        <input type="hidden" class="abc" id="" value="{{$CTSPID}}">
    </footer>
    {{-- {{$CTSPID}} --}}
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="{{ asset('assets/js/chiTietSP.js')}}">


    </script>
    {{-- <script>getvalue()</script> --}}
    <script>
        function getvalue(){
            return Number(document.querySelector('.input-qty').value);
        }
    </script>
    <script>
        async function ThemGHMOI(){
            const ma = document.querySelector(".abc").value;
            const size = document.getElementById("size").value;
            const sl = document.querySelector(".input-qty").value;
            const data = { CTSPID: ma, SoLuong: sl};
            // console.log(sl);
            // console.log(data)
            // console.log(giatri);

            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/ThemGH', {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);
            })
            .catch((error) => {
            console.error('Error:', error);
            });
            window.location.reload();
        }
    </script>
</html>
