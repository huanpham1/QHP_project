<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylehome.css')}}">
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
            <a href="./"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
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
                <form action="{{route('search-products')}}" method="get">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm...">
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
    <div class="banner"><img src="{{ asset('assets/images/Image 1.png')}}" alt="banner1"></div>
    <div class="content">
        <div class="title0"><p>SẢN PHẨM</p></div>
        <div class="sp-nam">
            <div class="title1"><img src="{{ asset('assets/images/Image 3.png')}}" alt="nam"></div>
                @if (!empty($SanPhamList))
                    <div class="hang">
                        @for($j = 0; $j < 5; $j++)
                        <div class="cot">
                            {{-- {{ route('displayProject', ['projects' => $projects->id]) }} --}}
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><img src="{{ asset('assets/images/'.$SanPhamList[$j]->HinhAnh)}}" alt="Giay"></a>
                            <a href="#"><p class="tensp">{{$SanPhamList[$j]->MaSP}}</p></a>
                             <a href="#"><p class="price">{{$SanPhamList[$j]->GiaBan}}</p></a>
                        </div>
                        @endfor
                    </div>
							@else
							<tr>
								<td colspan="4">Không có danh mục</td>
							</tr>
				@endif

            </div>
        </div>
        <div class="view-more">
            <a href="#"><button>VIEW MORE PRODUCTS</button></a>
        </div>
        <div class="sp-nu">
            <div class="title2"><img src="{{ asset('assets/images/Image 11.png')}}" alt="nu"></div>
            <div class="hang">
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
            </div>
            <div class="hang">
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
                <div class="cot">
                    <a href="#"><img src="{{ asset('assets/images/Image 4.png')}}" alt="Giay"></a>
                    <a href="#"><p class="tensp">Multicolor Men's Sneaker</p></a>
                    <a href="#"><p class="price">$60</p></a>
                </div>
            </div>
            <div class="view-more">
                <a href="#"><button>VIEW MORE PRODUCTS</button></a>
            </div>
        </div>
    </div>
    <div class="feed-back">
        <div class="title3"><p>HASHTAG QHP FOR THE CHANCE TO BE ON OUR WEBSITE</p></div>
        <div class="fb">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
            <img src="{{ asset('assets/images/Image 26.png')}}" alt="feed back">
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

        <div class="copyright">© Copyright QHP Store</div>
    </footer>
</body>
<script>
    function logout(){
        let url = "{{ route('checkout') }}";

        document.location.href=url;
    }

</script>
</html>
