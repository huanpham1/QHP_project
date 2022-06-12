<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Search.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
    <header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order" style="color: white"><a href="#">Kiểm tra đơn hàng</a></div>
            <div class="login">
                @if (!(session()->has('TenTaiKhoan')))
                    <a href="{{route('DangNhap')}}">Đăng Nhập</a>
                    <pre>|</pre>
                    <a href="./DangKy">Đăng Ký</a>

                    @endif

            </div>
        </div>
        <div class="hduoi">
            <a href="/"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
            <nav>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li class="nam">
                        <a href="DanhMuc">Nam</a>
                        <ul class="namnam">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li class="nu">
                        <a href="DanhMuc">Nữ</a>
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

            <a href="./GioHang"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        </div>
    </header>
    <div class="content">
        <div class="product">
            <div class="title0">
                <p>Kết quả tìm kiếm cho "{{$key}}"</p>
                <p style="font-size:16px;">({{count($foundProducts)}} sản phẩm)</p>
            </div>
            <div class="sp-nam">
                @if (!empty($foundProducts))
                    @foreach($foundProducts as $key=>$item)
                        @if ($key % 4 == 0)
                            <div class="hang">
                        @endif
                        <div class="cot">
                            <a href="#"><img src="{{ asset('storage/products/' . $item->HinhAnh) }}" alt="Giay"></a>
                            <a href="#"><p class="tensp">{{$item->TenSP}}</p></a>
                            <a href="#"><p class="price">${{$item->GiaBan}}</p></a>
                        </div>
                        @if ($key % 4 == 3 || ($key+1 == count($foundProducts)))
                            </div>
                        @endif
                    @endforeach
                    <div class="view-more">
                        <a href="#"><button>VIEW MORE PRODUCTS</button></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <footer>
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
    </footer>
</body>
</html>
