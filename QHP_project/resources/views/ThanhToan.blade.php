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
                    <?php foreach($danhmuc as $datadm){ ?>
                        <li class="nam">
                            <a href="{{route('XemDanhMuc.index',['id'=>$datadm->MaDanhMuc])}}"><?php echo $datadm->TenDanhMuc ?> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                            <ul class="namnam">
                                <?php foreach($theloai as $data){ ?>
                                    <li><a href="{{route('XemTheLoai.index',['id'=>$data->MaTheLoai])}}"><?php echo $data->TenTheLoai ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                </ul>
            </nav>
            <div class="search">
                <form action="{{route('search-products')}}" method="get">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm...">
                </form>
            </div>
            {{-- href="{{route('ThongTinCaNhan.index')}}" --}}
            <div class="acc_cart">
                    @if (session()->has('TenTaiKhoan'))
                        <a class="acc"  >
                            <div><i class="fa-solid fa-user"></i></div>
                            <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                            <div class="loguot" onclick="logout()">Logout </div>
                        </a>

                    @endif

                <a href="{{route('giohang')}}"><i class="fa-solid fa-cart-shopping GH">
                    @if(count(Session::get('cart', array()))>0)
                        <div class="carthover">
                            @if(session('cart'))
                                @php echo count(Session::get('cart', array())); @endphp
                            @endif
                        </div>
                    @endif

                </i></a>
            </div>
        </div>
    </header>
    <div class="content" style="display:flex;">
        <div class="thongTinGiaoHang">
            <div class="title1">Thông tin giao hàng</div>
            <div class="info">
                                        
            </div>
        </div>
        <div class="sanpham">
        <div class="cart-item">
            <table>
                <tr>
                    <th style="width: 15%;"></th>
                    <th style="width: 40%; text-align: left; padding-left: 10px;">TÊN SẢN PHẨM</th>
                    <th style="width: 15%; text-align: center;">SỐ LƯỢNG</th>
                    <th style="width: 15%; text-align: right;">GIÁ</th>
                    <th style="width: 15%; text-align: right;">THÀNH TIỀN</th>
                </tr>
                {{-- {{ count((array) session('cart')) }} --}}
                @php $total = 0; @endphp
                @if(isset($SP))
                @foreach ($SP as $id => $item)
                {{-- @php dd($item[0]->SoLuongCon); @endphp --}}
                {{-- @php $home =  $item['SoLuong'] @endphp --}}
                <tr>
                    <td style="padding: 0px;"><div class="cart-image"><a href="{{route('chitiet',['id' => $item[1]->MaSP]) }}"><img src="{{asset('storage/products/'.$item[1]->HinhAnh)}}" alt="Giay"></div></a></td>
                    <td class="item-name">
                       <a href="{{route('chitiet',['id' => $item[1]->MaSP]) }}">{{$item[1]->TenSP}}</a>
                        <div class="item-infor">
                            {{-- <div class="color">Màu: <div class="item-color"></div></div> --}}
                            @php $total += $item[1]->GiaBan * $item['SoLuong']; @endphp
                            <div class="size">Size: <div class="item-size">{{$item[0]->Size}}</div></div>
                            <div class="btn-delete" onclick="DeleteCart('{{$id}}')">
                                <a href="#">
                                <strong><i class="fa-solid fa-square-xmark"></i>
                                Xóa</strong>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="item-quantity">

                        <input type="number" class="SoLuong" min="1"  value="{{$item['SoLuong']}}" onchange="UpdateCart('{{$id}}')" placeholder="">
                        <div class="slKhongHopLe"></div>
                    </td>
                    <td class="item-price">{{$item[1]->GiaBan}}đ</td>
                    <td class="item-total">{{$item[1]->GiaBan * $item['SoLuong']}}đ</td>
                </tr>
                @endforeach
                @endif

            </table>
            <hr style="margin-top: 30px;">
            <div class="cart-pay">
                <div class="shop-support">
                    <a href="index.html" class="buy-more">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        Tiếp tục mua hàng
                    </a>

                    <div class="shop-contact">
                        <p>Để nhận tư vấn hoặc hỗ trợ khi phát sinh khó khăn trong lúc mua hàng, hãy liên hệ QHP thông qua:</p>
                        <ul>
                            <li>
                                Gọi <span class="phone-number"><strong>0987666666</strong></span>
                            </li>
                            <li>
                                Email tới địa chỉ
                                <a href="mailto:tuvan_online@qhp.com.vn" class="email">
                                    <strong>tuvan_online@qhp.com.vn</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user-total-price">
                    <div class="total-price">
                        <strong>Tạm Tính: <span style="color: red;">{{$total }}đ</span></strong>
                    </div>
                    <div class="user-pay">
                        <input type="submit" value="ĐẶT HÀNG">
                    </div>
                </div>
            </div>
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
